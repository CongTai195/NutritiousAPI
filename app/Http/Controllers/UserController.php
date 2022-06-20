<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Helpers\ResponseHelper;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\UserResource;
use Response;
use App\Helpers\Status;
use App\Helpers\HttpCode;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Diary;
use App\Models\Process;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaryFoodDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $calories_cut = 0;
        $age = $request->age;
        $gender = $request->gender;
        $height = $request->height;
        $starting_weight = $request->starting_weight;
        $goal_weight = $request->goal_weight;
        $weekly_goal = $request->weekly_goal;
        $potassium = $gender == 1 ? 3500 : 2500;

        if ($weekly_goal == "Lose 0,2 kilograms per week") {
            $calories_cut += 2000 / 9;
        } else if ($weekly_goal == "Lose 0,5 kilograms per week") {
            $calories_cut += 5000 / 9;
        } else if ($weekly_goal == "Lose 0,8 kilograms per week") {
            $calories_cut += 8000 / 9;
        } else if ($weekly_goal == "Lose 1 kilogram per week") {
            $calories_cut += 10000 / 9;
        } else if ($weekly_goal == "Gain 0,2 kilograms per week") {
            $calories_cut -= 2000 / 9;
        } else if ($weekly_goal == "Gain 0,5 kilograms per week") {
            $calories_cut -= 5000 / 9;
        } else {
            $calories_cut += 0;
        }

        $activity_level = $request->activity_level;
        $activity_level_rate = $activity_level == "Not Very Active" ? 1.2 : ($activity_level == "Lightly Active" ? 1.375 : ($activity_level == "Active" ? 1.55 :
            1.725));
        $BMR = $gender == 1 ? round(10 * $starting_weight + 6.25 * $height - 5 * $age + 5) : round(10 * $starting_weight + 6.25 * $height - 5 * $age - 161);
        $TDEE = round($BMR * $activity_level_rate);
        $calories = round($TDEE - $calories_cut);

        $register_request = [
            "email" => $request->email,
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "gender" => $gender,
            "age" => $age
            // "height" => $height,
            // "starting_weight" => $starting_weight,
            // "goal_weight" => $goal_weight,
            // "weekly_goal" => $weekly_goal,
            // "activity_level" => $activity_level,
            // "BMR" => $BMR,
            // "TDEE" => $TDEE,
            // "calories" => $calories,
        ];

        User::create($register_request);

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            $errors['auth'] = "Invalid email or password";
            return ResponseHelper::send([], Status::NG, HttpCode::UNAUTHORIZED, $errors);
        }
        $process_request = [
            'user_id' => auth('api')->user()->id,
            "height" => $height,
            "starting_weight" => $starting_weight,
            "current_weight" => $starting_weight,
            "goal_weight" => $goal_weight,
            "weekly_goal" => $weekly_goal,
            "activity_level" => $activity_level,
            "BMR" => $BMR,
            "TDEE" => $TDEE,
            "calories" => $calories,
            'carbs' => 50,
            'protein' => 30,
            'fat' => 20,
            'cholesterol' => round($calories * 0.15),
            'sodium' => 2300,
            'potassium' => $potassium,
            'vitamin_A' => 100,
            'vitamin_C' => 100,
            'vitamin_D' => 100,
            'calcium' => 100,
            'iron' => 100,
        ];

        Process::create($process_request);

        return ResponseHelper::send(['token' => $token, 'info' => new UserResource(auth('api')->user())]);
    }

    public function updateProcess(UpdateUserRequest $request)
    {
        $user_id = auth('api')->user()->id;
        $today = Carbon::now()->format('Y-m-d');

        $process = Process::all()->where('user_id', $user_id)->last();
        $process_id = $process->id;
        $diary = Diary::where(([['process_id', $process_id], ['date', $today]]))->get()->first();
        $starting_weight = $request->starting_weight;
        $current_weight = $request->current_weight;
        $goal_weight = $request->goal_weight;
        $weekly_goal = $request->weekly_goal;
        $activity_level = $request->activity_level;
        if (
            isset($starting_weight) &&
            isset($current_weight) &&
            isset($goal_weight) &&
            isset($weekly_goal) &&
            isset($activity_level)
        ) {
            $gender = auth('api')->user()->gender;
            $age = auth('api')->user()->age;
            $height = $process->height;
            $potassium = $gender == 1 ? 3500 : 2500;
            $calories_cut = 0;
            if ($weekly_goal == "Lose 0,2 kilograms per week") {
                $calories_cut += 2000 / 9;
            } else if ($weekly_goal == "Lose 0,5 kilograms per week") {
                $calories_cut += 5000 / 9;
            } else if ($weekly_goal == "Lose 0,8 kilograms per week") {
                $calories_cut += 8000 / 9;
            } else if ($weekly_goal == "Lose 1 kilogram per week") {
                $calories_cut += 10000 / 9;
            } else if ($weekly_goal == "Gain 0,2 kilograms per week") {
                $calories_cut -= 2000 / 9;
            } else if ($weekly_goal == "Gain 0,5 kilograms per week") {
                $calories_cut -= 5000 / 9;
            } else {
                $calories_cut += 0;
            }
            $activity_level_rate = $activity_level == "Not Very Active" ? 1.2 : ($activity_level == "Lightly Active" ? 1.375 : ($activity_level == "Active" ? 1.55 :
                1.725));
            $BMR = $gender == 1 ? round(10 * $starting_weight + 6.25 * $height - 5 * $age + 5) : round(10 * $starting_weight + 6.25 * $height - 5 * $age - 161);
            $TDEE = round($BMR * $activity_level_rate);
            $calories = round($TDEE - $calories_cut);
            $process_request = [
                "starting_weight" => $starting_weight,
                "current_weight" => $current_weight,
                "goal_weight" => $goal_weight,
                "weekly_goal" => $weekly_goal,
                "activity_level" => $activity_level,
                "BMR" => $BMR,
                "TDEE" => $TDEE,
                "calories" => $calories,
                'cholesterol' => round($calories * 0.15),
                'potassium' => $potassium,
            ];
            DB::table('processes')->where('id', $process_id)->update($process_request);
            DB::table('diaries')->where('id', $diary->id)->update([
                'weight_log' => $current_weight
            ]);
        } else
            DB::table('processes')->where('id', $process_id)->update($request->all());
        return ResponseHelper::send();
    }
}

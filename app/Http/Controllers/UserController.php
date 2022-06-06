<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Helpers\ResponseHelper;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\UserResource;
use Response;
use App\Helpers\Status;
use App\Helpers\HTTPCode;
use App\Http\Requests\RegisterRequest;
use App\Models\Process;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $activity_level_rate = $activity_level == "Not Very Active" ? 1.2 : ($activity_level == "Lightly Active" ? 1.375 : ($activity_level == "Active" ? 1.55 : 1.725));
        $BMR = $gender == 1 ? round(10 * $starting_weight + 6.25 * $height - 5 * $age + 5) : round(10 * $starting_weight + 6.25 * $height - 5 * $age - 161);
        $TDEE = round($BMR * $activity_level_rate);
        $calories = round($TDEE - $calories_cut);

        //dd($BMR);

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
            "goal_weight" => $goal_weight,
            "weekly_goal" => $weekly_goal,
            "activity_level" => $activity_level,
            "BMR" => $BMR,
            "TDEE" => $TDEE,
            "calories" => $calories,
            'carbs' => 50,
            'protein' => 30,
            'fat' => 20
        ];

        Process::create($process_request);

        return ResponseHelper::send(['token' => $token, 'info' => new UserResource(auth('api')->user())]);
    }
}

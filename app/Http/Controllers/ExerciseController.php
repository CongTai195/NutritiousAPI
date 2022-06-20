<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Helpers\ResponseHelper;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\FoodResource;
use Response;
use App\Helpers\Status;
use App\Helpers\HttpCode;
use App\Http\Requests\SearchFoodRequest;
use App\Http\Resources\ExerciseResource;
use App\Models\Diary;
use App\Models\DiaryExerciseDetail;
use App\Models\Process;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResponseHelper::send(ExerciseResource::collection(Exercise::all()->where('user_id', null)));
    }

    public function indexMyExercise()
    {
        $user = auth('api')->user();

        return ResponseHelper::send(ExerciseResource::collection(Exercise::all()->where('user_id', $user->id)->sortByDesc('id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        return ResponseHelper::send(new ExerciseResource($exercise));
    }

    public function addExercise(StoreExerciseRequest $request)
    {
        $user = auth('api')->user();
        $name = $request->name;
        $duration = $request->duration;
        $calories = $request->calories;

        $exercise = Exercise::create([
            'user_id' => $user->id,
            'name' => $name,
            'calories' => round($calories / $duration, 1)
        ]);

        $diary_id = $request->diary_id;
        $exercise_id = $exercise->id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            DiaryExerciseDetail::create([
                "diary_id" => $diary_id,
                "exercise_id" => $exercise_id,
                "duration" => $duration
            ]);

            return ResponseHelper::send();
        } else {
            return ResponseHelper::send(
                [],
                Status::NG,
                HttpCode::FORBIDDEN,
                ['jwt_middleware_error' => "You are not allowed to add this."]
            );
        }
    }


    public function search(SearchFoodRequest $request)
    {
        $name = $request['name'];
        return ResponseHelper::send(ExerciseResource::collection(Exercise::where('name', 'LIKE', '%' . $name . '%')->get()));
    }

    public function searchMyExercise(SearchFoodRequest $request)
    {
        $name = $request['name'];
        $user = auth('api')->user();
        $exercise = ExerciseResource::collection(Exercise::where([
            ['name', 'LIKE', '%' . $name . '%'],
            ['user_id', $user->id]
        ])->orderBy('id', 'desc')->get());
        return ResponseHelper::send($exercise);
    }
}

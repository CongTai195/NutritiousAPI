<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Helpers\ResponseHelper;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\FoodResource;
use Response;
use App\Helpers\Status;
use App\Helpers\HTTPCode;
use App\Http\Resources\ExerciseResource;
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
        return ResponseHelper::send(ExerciseResource::collection(Exercise::all()));
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

    /**
     * Display the specified resource.
     *
     * @param  StoreFoodRequest  $request
     * @return \Illuminate\Http\Response
     */

    // public function search($name)
    // {
    //     //$name = $request['name'];
    //     // if (empty($name)) {
    //     //     $errors['auth'] = "Invalid email or password";
    //     //     return ResponseHelper::send([], Status::NG, HttpCode::UNAUTHORIZED, $errors);
    //     // }
    //     return ResponseHelper::send(FoodResource::collection(Food::where('name', 'LIKE', '%' . $name . '%')->get()));
    // }

    public function search(StoreExerciseRequest $request)
    {
        $name = $request['name'];
        return ResponseHelper::send(ExerciseResource::collection(Exercise::where('name', 'LIKE', '%' . $name . '%')->get()));
    }
}

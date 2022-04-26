<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Helpers\ResponseHelper;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\FoodResource;
use Response;
use App\Helpers\Status;
use App\Helpers\HTTPCode;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResponseHelper::send(FoodResource::collection(Food::all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return ResponseHelper::send(new FoodResource($food));
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

    public function search(StoreFoodRequest $request)
    {
        $name = $request['name'];
        return ResponseHelper::send(FoodResource::collection(Food::where('name', 'LIKE', '%' . $name . '%')->get()));
    }
}

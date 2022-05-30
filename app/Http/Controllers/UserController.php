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
use App\Http\Requests\RegisterRequest;
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
        $register_request = [
            "email" => $request->email,
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "gender" => $request->gender,
            "height" => $request->height,
            "starting_weight" => $request->starting_weight,
            "goal_weight" => $request->goal_weight,
            "weekly_goal" => $request->weekly_goal,
            "activity_level" => $request->activity_level,
        ];

        $user = User::create($register_request);

        return ResponseHelper::send($user);
    }
}

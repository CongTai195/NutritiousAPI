<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\DiaryFoodDetail;
use App\Http\Requests\StoreDiaryFoodDetailRequest;
use App\Http\Requests\UpdateDiaryFoodDetailRequest;
use App\Models\Diary;
use App\Helpers\HttpCode;
use App\Helpers\Status;
use App\Http\Resources\DiaryDetailFoodResource;
use App\Models\Process;

class DiaryFoodDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaryFoodDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryFoodDetailRequest $request)
    {
        $diary_id = $request->diary_id;
        $meal = $request->meal;
        $serving_size_food_id = $request->serving_size_food_id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;

        $diary_food_detail = DiaryFoodDetail::where([["diary_id", $diary_id], ["meal", $meal], ["serving_size_food_id", $serving_size_food_id]])->first();

        if ($user == auth('api')->user()->id) {
            if ($diary_food_detail) {
                $update_request = [
                    "diary_id" => $diary_id,
                    "serving_size_food_id" => $serving_size_food_id,
                    "quantity" => $diary_food_detail->quantity + $request->quantity,
                    "meal" =>  $diary_food_detail->meal
                ];
                $diary_food_detail->update($update_request);

                return ResponseHelper::send();
            } else {
                $food = DiaryFoodDetail::create($request->all());

                return ResponseHelper::send($food);
            }
        } else {
            return ResponseHelper::send(
                [],
                Status::NG,
                HttpCode::FORBIDDEN,
                ['jwt_middleware_error' => "You are not allowed to add this."]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function show(DiaryFoodDetail $diaryFoodDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaryFoodDetailRequest  $request
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaryFoodDetailRequest $request, DiaryFoodDetail $diaryFoodDetail)
    {
        $diary_id = $diaryFoodDetail->diary_id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $diaryFoodDetail->update($request->all());

            return ResponseHelper::send();
        } else {
            return ResponseHelper::send(
                [],
                Status::NG,
                HttpCode::FORBIDDEN,
                ['jwt_middleware_error' => "You are not allowed to update this."]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaryFoodDetail $diaryFoodDetail)
    {

        $diary_id = $diaryFoodDetail->diary_id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $diaryFoodDetail->delete();

            return ResponseHelper::send();
        } else {
            return ResponseHelper::send(
                [],
                Status::NG,
                HttpCode::FORBIDDEN,
                ['jwt_middleware_error' => "You are not allowed to update this."]
            );
        }
    }
}

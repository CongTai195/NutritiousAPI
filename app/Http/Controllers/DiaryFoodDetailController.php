<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\DiaryFoodDetail;
use App\Http\Requests\StoreDiaryFoodDetailRequest;
use App\Http\Requests\UpdateDiaryFoodDetailRequest;
use App\Models\Diary;
use App\Helpers\HttpCode;
use App\Helpers\Status;

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
        $user = Diary::where('id', $diary_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $food = DiaryFoodDetail::create($request->all());

            return ResponseHelper::send($food);
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
        //
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
        $user = Diary::where('id', $diary_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $diaryFoodDetail->delete();

            return ResponseHelper::send();
        } else {
            return ResponseHelper::send(
                [],
                Status::NG,
                HttpCode::FORBIDDEN,
                ['jwt_middleware_error' => "You are not allowed to delete this."]
            );
        }
    }
}

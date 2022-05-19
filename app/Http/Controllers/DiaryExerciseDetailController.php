<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\DiaryFoodDetail;
use App\Http\Requests\StoreDiaryExerciseDetailRequest;
use App\Http\Requests\UpdateDiaryFoodDetailRequest;
use App\Models\Diary;
use App\Helpers\HttpCode;
use App\Helpers\Status;
use App\Models\DiaryExerciseDetail;

class DiaryExerciseDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreDiaryExerciseDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryExerciseDetailRequest $request)
    {
        $diary_id = $request->diary_id;
        $user = Diary::where('id', $diary_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $exercise = DiaryExerciseDetail::create($request->all());

            return ResponseHelper::send($exercise);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaryExerciseDetail $diaryExerciseDetail)
    {

        $diary_id = $diaryExerciseDetail->diary_id;
        $user = Diary::where('id', $diary_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $diaryExerciseDetail->delete();

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

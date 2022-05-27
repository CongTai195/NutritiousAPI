<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\DiaryFoodDetail;
use App\Http\Requests\StoreDiaryExerciseDetailRequest;
use App\Http\Requests\UpdateDiaryExerciseDetailRequest;
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
        $exercise_id = $request->exercise_id;
        $diary_exercise_detail = DiaryExerciseDetail::where([["diary_id", $diary_id], ['exercise_id', $exercise_id]])->first();
        $user = Diary::where('id', $diary_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            if ($diary_exercise_detail) {
                $update_request = [
                    "diary_id" => $diary_id,
                    "exercise_id" => $exercise_id,
                    "duration" => $diary_exercise_detail->duration + $request->duration,
                ];
                $diary_exercise_detail->update($update_request);

                return ResponseHelper::send();
            } else {
                $exercise = DiaryExerciseDetail::create($request->all());

                return ResponseHelper::send($exercise);
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaryExerciseDetailRequest  $request
     * @param  \App\Models\DiaryExerciseDetail  $diaryExerciseDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaryExerciseDetailRequest $request, DiaryExerciseDetail $diaryExerciseDetail)
    {
        $diary_id = $diaryExerciseDetail->diary_id;
        $user = Diary::where('id', $diary_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            $diaryExerciseDetail->update($request->all());

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

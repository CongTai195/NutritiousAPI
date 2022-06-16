<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\DiaryFoodDetail;
use App\Http\Requests\StoreDiaryFoodDetailRequest;
use App\Http\Requests\UpdateDiaryFoodDetailRequest;
use App\Models\Diary;
use App\Helpers\HttpCode;
use App\Helpers\Status;
use App\Http\Requests\UpdateDiaryRequest;
use App\Http\Requests\UpdateWaterRequest;
use App\Http\Resources\DiaryDetailFoodResource;
use App\Models\DiaryWaterDetail;
use App\Models\Process;
use Illuminate\Support\Facades\DB;

class DiaryWaterDetailController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaryFoodDetailRequest  $request
     * @param  \App\Models\DiaryFoodDetail  $diaryFoodDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWaterRequest $request)
    {
        $diary_id = $request->diary_id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $user = Process::where('id', $process_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            DB::table('diary_water_details')->where('diary_id', $diary_id)->update([
                'amount' => $request->amount,
            ]);

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

    public function add(UpdateWaterRequest $request)
    {
        $diary_id = $request->diary_id;
        $process_id = Diary::where('id', $diary_id)->first()->process_id;
        $water_diary = DiaryWaterDetail::where('diary_id', $diary_id)->first();
        $user = Process::where('id', $process_id)->first()->user_id;
        if ($user == auth('api')->user()->id) {
            DB::table('diary_water_details')->where('diary_id', $diary_id)->update([
                'amount' => $water_diary->amount + $request->amount,
            ]);

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

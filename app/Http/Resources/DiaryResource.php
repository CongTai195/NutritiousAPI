<?php

namespace App\Http\Resources;

use App\Models\DiaryExerciseDetail;
use App\Models\DiaryFoodDetail;
use App\Models\DiaryWaterDetail;
use App\Models\Process;
use Illuminate\Http\Resources\Json\JsonResource;

class DiaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $food = DiaryDetailFoodResource
            ::collection(
                DiaryFoodDetail
                    ::all()
                    ->where('diary_id',  $this->id)
            );

        $exercise = DiaryDetailExerciseResource
            ::collection(
                DiaryExerciseDetail
                    ::all()
                    ->where('diary_id',  $this->id)
            );

        $process = Process::where('id', $this->process_id)->first();
        $water = DiaryWaterDetail::where('diary_id', $this->id)->first();


        return [
            'id' => $this->id,
            'date' => $this->date,
            'process' => $process,
            'food' =>  $food,
            'exercise' => $exercise,
            'water' => $water->amount
        ];
    }
}

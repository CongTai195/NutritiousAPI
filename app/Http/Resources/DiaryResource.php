<?php

namespace App\Http\Resources;

use App\Models\DiaryExerciseDetail;
use App\Models\DiaryFoodDetail;
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


        return [
            'id' => $this->id,
            'date' => $this->date,
            'food' =>  $food,
            'exercise' => $exercise
        ];
    }
}

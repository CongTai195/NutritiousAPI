<?php

namespace App\Http\Resources;

use App\Models\DiaryExerciseDetail;
use App\Models\DiaryFoodDetail;
use App\Models\DiaryWaterDetail;
use App\Models\Exercise;
use App\Models\Process;
use App\Models\Serving_size_food;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $food =
            DiaryFoodDetail
            ::all()
            ->where('diary_id',  $this->id);

        $food = $food->toArray();
        $calories_in = 0;

        foreach ($food as $item) {
            $serving_size = Serving_size_food
                ::where('id', $item["serving_size_food_id"])->first();
            $calories = round($serving_size->calories * $item["quantity"]);
            $calories_in += $calories;
        }
        $exercise =
            DiaryExerciseDetail
            ::all()
            ->where('diary_id',  $this->id);
        $exercise = $exercise->toArray();
        $calories_out = 0;
        foreach ($exercise as $item) {
            $exercise_id = Exercise
                ::where('id', $item["exercise_id"])
                ->first();
            $calories = round($exercise_id->calories * $item["duration"]);
            $calories_out += $calories;
        }

        $water = DiaryWaterDetail::where('diary_id', $this->id)->first();


        return [
            'id' => $this->id,
            'date' => $this->date,
            'food' =>  $calories_in,
            'exercise' => $calories_out,
            'water' => $water->amount,
            'weight_log' => $this->weight_log,
            'blood_pressure_log' => $this->blood_pressure_log,
            'heart_rate_log' => $this->heart_rate_log,
        ];
    }
}

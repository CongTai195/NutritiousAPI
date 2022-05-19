<?php

namespace App\Http\Resources;

use App\Models\Exercise;
use App\Models\Food;
use App\Models\Serving_size;
use App\Models\Serving_size_food;
use Illuminate\Http\Resources\Json\JsonResource;

class DiaryDetailExerciseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $exercise = Exercise
            ::where('id', $this->exercise_id)
            ->first();

        return [
            'id' => $this->id,
            'name' => $exercise->name,
            'calories' => $exercise->calories * $this->duration,
            'duration' => $this->duration,
        ];
    }
}

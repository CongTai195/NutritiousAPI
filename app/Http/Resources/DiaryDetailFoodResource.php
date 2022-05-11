<?php

namespace App\Http\Resources;

use App\Models\Food;
use App\Models\Serving_size;
use App\Models\Serving_size_food;
use Illuminate\Http\Resources\Json\JsonResource;

class DiaryDetailFoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $serving_size = Serving_size_food
            ::where('id', $this->serving_size_food_id)
            ->first();
        //$food_id = $serving_size->food_id;
        $food_name = Food::where('id', $serving_size->food_id)->first()->name;
        $food_detail = Food::where('id', $serving_size->food_id)->first()->detail;
        $serving_size_name = Serving_size::where('id', $serving_size->serving_size_id)->first()->name;
        $calories = $serving_size->calories * $this->quantity;
        $fat = $serving_size->fat * $this->quantity;
        $carbs = $serving_size->carbs * $this->quantity;
        $protein = $serving_size->protein * $this->quantity;

        return [
            'id' => $this->id,
            'name' => $food_name,
            'detail' => $food_detail,
            'serving_size' => $serving_size_name,
            'quantity' => $this->quantity,
            'meal' => $this->meal,
            'calories' => $calories,
            'fat' => $fat,
            'carbs' => $carbs,
            'protein' => $protein,
        ];
    }
}

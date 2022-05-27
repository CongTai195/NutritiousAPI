<?php

namespace App\Http\Resources;

use App\Models\Food;
use App\Models\Serving_size;
use App\Models\Serving_size_food;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\ArrayKey;

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
            ::where('id', $this->serving_size_food_id)->first();
        //$food_id = $serving_size->food_id;
        //$food = FoodResource;
        $food = Food::where('id', $serving_size->food_id)->first();
        $serving_size_name = Serving_size::where('id', $serving_size->serving_size_id)->first()->name;

        $calories = round($serving_size->calories * $this->quantity);
        $fat = round($serving_size->fat * $this->quantity, 1);
        $carbs = round($serving_size->carbs * $this->quantity, 1);
        $protein = round($serving_size->protein * $this->quantity, 1);
        $cholesterol = round($serving_size->cholesterol * $this->quantity, 1);
        $sodium = round($serving_size->sodium * $this->quantity, 1);

        $calcium = round($serving_size->calcium * $this->quantity, 1);
        $iron = round($serving_size->iron * $this->quantity, 1);
        $potassium = round($serving_size->potassium * $this->quantity, 1);
        $vitamin_A = round($serving_size->vitamin_A * $this->quantity, 1);
        $vitamin_C = round($serving_size->vitamin_C * $this->quantity, 1);
        $vitamin_D = round($serving_size->vitamin_D * $this->quantity, 1);



        return [
            'id' => $this->id,
            'food' => new FoodResource($food),
            'serving_size' => $serving_size_name,
            'quantity' => $this->quantity,
            'meal' => $this->meal,
            'calories' => $calories,
            'fat' => $fat,
            'carbs' => $carbs,
            'protein' => $protein,
            'cholesterol' => $cholesterol,
            'sodium' => $sodium,
            'calcium' => $calcium,
            'iron' => $iron,
            'potassium' => $potassium,
            'vitamin_A' => $vitamin_A,
            'vitamin_C' => $vitamin_C,
            'vitamin_D' => $vitamin_D,
        ];
    }
}

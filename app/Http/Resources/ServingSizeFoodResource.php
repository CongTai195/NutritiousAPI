<?php

namespace App\Http\Resources;

use App\Models\Serving_size;
use App\Models\Serving_size_food;
use Illuminate\Http\Resources\Json\JsonResource;

class ServingSizeFoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $name_serving_size = Serving_size
                            ::where('id', $this->serving_size_id)
                            ->get('name')
                            ->first()
                            ->name;

        $nutrition_facts = Serving_size_food
                                    ::where([['serving_size_id',  $this->serving_size_id], ['food_id',  $this->food_id]])
                                    ->first()
                                    ;
        return [
            'id' => $this->id,
            'serving_size' => $name_serving_size,
            'calories' => $nutrition_facts->calories,
            'fat' => $nutrition_facts->fat,
            'cholesterol' => $nutrition_facts->cholesterol,
            'sodium' => $nutrition_facts->sodium,
            'carbs' => $nutrition_facts->carbs,
            'protein' => $nutrition_facts->protein,
            'calcium' => $nutrition_facts->calcium,
            'iron' => $nutrition_facts->iron,  
            'potassium' => $nutrition_facts->potassium, 
            'vitamin_D' => $nutrition_facts->vitamin_D, 
            'vitamin_A' => $nutrition_facts->vitamin_A, 
            'vitamin_C' => $nutrition_facts->vitamin_C, 
        ];
    }
}

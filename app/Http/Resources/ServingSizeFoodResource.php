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

        $calories = Serving_size_food
                                    ::where([['serving_size_id',  $this->serving_size_id], ['food_id',  $this->food_id]])
                                    ->get('calories')
                                    ->first()
                                    ->calories;
        return [
            'id' => $this->id,
            'serving_size' => $name_serving_size,
            'calories' => $calories
        ];
    }
}

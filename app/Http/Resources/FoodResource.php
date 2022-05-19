<?php

namespace App\Http\Resources;

use App\Models\Serving_size_food;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $nutrition_fact = ServingSizeFoodResource
            ::collection(
                Serving_size_food
                    ::all()
                    ->where('food_id',  $this->id)
            );
        return [
            'id' => $this->id,
            'imageURL' => $this->imageURL,
            'name' => $this->name,
            'detail' => $this->detail,
            'fromCarbs' => $this->fromCarbs,
            'fromFat' => $this->fromFat,
            'fromProtein' => $this->fromProtein,
            'nutrition_facts' =>  $nutrition_fact
            //where('food_id',  $this->id)->paginate()
        ];
    }
}

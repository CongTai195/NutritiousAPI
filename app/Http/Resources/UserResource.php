<?php

namespace App\Http\Resources;

use App\Models\Process;
use App\Models\Serving_size;
use App\Models\Serving_size_food;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $process = (Process::all()->where('user_id',  $this->id)->last());

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'age' => $this->age,
            'process' => $process
        ];
    }
}

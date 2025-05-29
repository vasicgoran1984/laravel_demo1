<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookServiceListResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'car_id'   => $this->car_id,
            'owner_id' => $this->owner_id,
            'car' => $this->whenLoaded('cars', function () {
                return [
                    'chassis_number' => $this->cars->chassis_number,
                    'type_name' => $this->cars->type->name,
                    'producer_name' => $this->cars->type->producer->name,
                ];
            }),
            'owner' => $this->whenLoaded('owners', function () {
                return [
                    'first_name' => $this->owners->first_name,
                    'last_name' => $this->owners->last_name,
                    'city' => $this->owners->city,
                ];
            })
        ];
    }
}

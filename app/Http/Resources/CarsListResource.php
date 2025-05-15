<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarsListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'chassis_number' => $this->chassis_number,
            'engine_number'  => $this->engine_number,
            'year'           => $this->year,
            'plate_number'   => $this->plate_number,
            'volume'         => $this->volume,
            'power'          => $this->power,
            'created_at'     => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'type_name' => $this->type->name,
            'producer_name' => $this->type->producer->name,
        ];
    }
}

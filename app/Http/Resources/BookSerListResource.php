<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookSerListResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return [
//            'id'       => $this->id,
//            'car_id'   => $this->car_id,
//            'owner_id' => $this->owner_id,
//            'car' => $this->whenLoaded('cars', function () {
//                return [
//                    'chassis_number' => $this->cars->chassis_number,
//                    'type_name' => $this->cars->type->name,
//                    'producer_name' => $this->cars->type->producer->name,
//                ];
//            }),
//            'owner' => $this->whenLoaded('owners', function () {
//                return [
//                    'first_name' => $this->owners->first_name,
//                    'last_name' => $this->owners->last_name,
//                    'city' => $this->owners->city,
//                ];
//            })
//        ];


        return [
            'data' => $this->resource->keyBy('id'), // Converts array to object (key-value pairs)
            'links' => [
                'first' => $this->url(1),
                'last' => $this->url($this->lastPage()),
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $this->currentPage(),
                'from' => $this->firstItem(),
                'last_page' => $this->lastPage(),
                'path' => $this->path(),
                'per_page' => $this->perPage(),
                'limit' => $this->perPage(),
                'to' => $this->lastItem(),
                'total' => $this->total(),
            ],
        ];

    }
}

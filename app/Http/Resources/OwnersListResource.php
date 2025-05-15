<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnersListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'city'       => $this->city,
            'address'    => $this->address,
            'phone'      => $this->phone,
            'email'      => $this->email,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
        ];
    }
}

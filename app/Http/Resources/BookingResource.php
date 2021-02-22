<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'locator_number' => $this->locator_number,
            'client' => $this->client,
            'entry_date' => $this->entry_date,
            'departure_date' => $this->departure_date,
            'hotel' => $this->hotel,
            'price' => $this->price,
            'actions' => $this->actions
        ];
    }
}

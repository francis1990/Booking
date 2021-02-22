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
            'locator_number' => $request->locator_number,
            'client' => $request->client,
            'entry_date' => $request->entry_date,
            'departure_date' => $request->departure_date,
            'hotel' => $request->hotel,
            'price' => $request->price,
            'actions' => $this->actions
        ];
    }
}

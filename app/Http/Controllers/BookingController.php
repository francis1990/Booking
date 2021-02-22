<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     *
     * @return AnonymousResourceCollection
     */
    public function index(){
        $bookings=Booking::all();

        return  BookingResource::collection($bookings) ;
    }

    public function export(){
        $bookings=Booking::all();
        Storage::delete('bookings.json');
        Storage::put('bookings.json', BookingResource::collection($bookings));

        return Storage::download('bookings.json');
    }
}

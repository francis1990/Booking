<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Services\ImportBookingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     *
     * @param ImportBookingService $service
     * @param Request $request
     * @return View
     */
    public function index(ImportBookingService $service,Request $request){
        $service->execute();
        $search=$request->input('search');
        $bookings=Booking::filtered($search)->get();
        return view('welcome', [
            'bookings' => $bookings,
            'search'=>$search
        ]);
    }

    public function export(){
        $bookings=Booking::all()->except(['created_at','updated_at']);
        Storage::delete('bookings.json');
        Storage::put('bookings.json', $bookings);

        return Storage::download('bookings.json');
    }
}

<?php


namespace App\Services;


use App\Imports\BookingImport;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ImportBookingService
{
    protected $url;
    const FILE_NAME='booking.csv';

    public function __construct()
    {
        $this->url = env('API_URL');
    }

    public function execute()
    {
        $response = Http::get($this->url);
        $response->throw();

        Storage::delete(self::FILE_NAME);
        Storage::put(self::FILE_NAME,$response);
        Excel::import(new BookingImport, self::FILE_NAME, null,\Maatwebsite\Excel\Excel::CSV);
    }


}

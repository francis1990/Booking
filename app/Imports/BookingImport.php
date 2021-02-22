<?php


namespace App\Imports;


use App\Models\Booking;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class BookingImport implements ToCollection,WithCustomCsvSettings
{

    public function collection(Collection $rows)
    {
        $rows->shift();
        foreach ($rows->all() as $row)
        {
            Booking::updateOrCreate([
                'locator_number' => $row[0],
                'client' => $row[1],
                'entry_date' => $row[2],
                'departure_date' => $row[3],
                'hotel' => $row[4],
                'price' => $row[5],
                'actions' => $row[6],
            ]);
        }
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }


}

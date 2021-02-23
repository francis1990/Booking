<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['locator_number','client','entry_date','departure_date','hotel','price','actions'];

    public function scopeFiltered($query,$search=null)
    {
        if ($search){
            $query->where(function($query) use ($search) {
                $query->where('locator_number',  'like', '%'.$search.'%')
                    ->orWhere('client','like', '%'.$search.'%')
                    ->orWhere('entry_date','like',  '%'.$search.'%')
                    ->orWhere('departure_date','like', '%'.$search.'%')
                    ->orWhere('hotel','like',  '%'.$search.'%')
                    ->orWhere('price','like',  '%'.$search.'%')
                    ->orWhere('actions','like',  '%'.$search.'%');
            });
        }
        return $query;
    }
}

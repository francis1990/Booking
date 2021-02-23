<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{

    public function test_can_list_all_bookings()
    {
        $response = $this->getJson(route('booking.list'));

        $response->assertSuccessful();
    }

    public function test_can_filter_bookings()
    {
        $response = $this->getJson(route('booking.list', ['search' => 'Nombre 12']));

        $response->assertSuccessful()
            ->assertSee('Nombre 12');
    }
}

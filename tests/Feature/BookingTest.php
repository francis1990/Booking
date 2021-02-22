<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_list_all_bookings()
    {
        $response = $this->getJson(route('booking.list'));

        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }
}

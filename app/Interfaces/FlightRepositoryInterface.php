<?php

namespace App\Interfaces;

interface FlightRepositoryInterface
{
    public function getAllFlights($filter = null);

    public function getFlightsByFlightNumber($flight_number);
}

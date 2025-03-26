<?php

namespace App\Interfaces;

interface FlightRepositoryInterface {
  public function getAlFlights($filter = null);
  public function getFlightsByFlightNumber($flight_number);
}
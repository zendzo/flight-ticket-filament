<?php

namespace App\Repositories;

use App\Interfaces\FlightRepositoryInterface;

class FlightRepository implements FlightRepositoryInterface
{

  public function getAlFlights($filter = null)
  {
    $flights = \App\Models\Flight::query();

    if (!empty($filter['departure'])) {
      $flights->whareHas('segments', function ($query) use ($filter) {
        $query->where('airport_id', $filter['departure'])
          ->where('squence', 1);
      });
    }

    if (!empty($filter['destination'])) {
      $flights->whareHas('segments', function ($query) use ($filter) {
        $query->where('airport_id', $filter['destination'])
          ->orderBy('squence', 'desc')
          ->limit(1);
      });
    }

    if (!empty($filter['date'])) {
      $flights->whereHas('segments', function ($query) use ($filter) {
        $query->whereDate('time', $filter['date']);
      });
    }

    return $flights->get();
  }

  public function getFlightsByFlightNumber($flight_number)
  {
    return \App\Models\Flight::where('flight_number', $flight_number)->first();
  }
}

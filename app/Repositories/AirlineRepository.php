<?php

namespace App\Repositories;

use App\Interfaces\AirlineRepositoryInterface;

class AirlineRepository implements AirlineRepositoryInterface
{
  /**
   * Retrieve all airlines.
   *
   * @return \Illuminate\Database\Eloquent\Collection<\App\Models\Airline>
   */
  public function getAll()
  {
    return \App\Models\Airline::all();
  }
}
<?php

namespace App\Repositories;

use App\Interfaces\AirportRepositoryInterface;

class AirportRepository implements AirportRepositoryInterface {

  public function getAllAirports() {
    return \App\Models\Airport::all();
  }

  public function getAirportBySlug($slug) {
    return \App\Models\Airport::where('slug', $slug)->first();
  }

  public function getAirportByIataCode($code) {
    return \App\Models\Airport::where('iata_code', $code)->first();
  }
}
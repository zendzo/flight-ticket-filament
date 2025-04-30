<?php

namespace App\Repositories;

use App\Interfaces\AirportRepositoryInterface;

class AirportRepository implements AirportRepositoryInterface
{
    public function getAllAirports()
    {
        // Use chunking to process large datasets efficiently and avoid memory issues
        $airports = [];
        \App\Models\Airport::select(['id', 'name', 'iata_code', 'image'])
            ->orderBy('id')
            ->chunk(1000, function ($chunk) use (&$airports) {
                foreach ($chunk as $airport) {
                    $airports[] = $airport;
                }
            });

        return collect($airports);
    }

    public function getAirportBySlug($slug)
    {
        return \App\Models\Airport::where('slug', $slug)->first();
    }

    public function getAirportByIataCode($code)
    {
        return \App\Models\Airport::where('iata_code', $code)->first();
    }
}

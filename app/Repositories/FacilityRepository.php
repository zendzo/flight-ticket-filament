<?php

namespace App\Repositories;

use App\Interfaces\FacilityRepositoryInterface;
use App\Models\Facility;

/**
 * Class FacilityRepository
 */
class FacilityRepository implements FacilityRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllFacilities()
    {
        return Facility::all();
    }
}

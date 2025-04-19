<?php

namespace App\Repositories;
use App\Interfaces\FacilityRepositoryInterface;
use App\Models\Facility;

/**
 * Class FacilityRepository
 * @package App\Repositories
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
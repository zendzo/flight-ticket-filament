<?php

namespace App\Http\Controllers;

use App\Interfaces\AirportRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(AirportRepositoryInterface $airportRepository) : \Illuminate\View\View
    {
        $airports = $airportRepository->getAllAirports();
        return view('pages.home', [
            'airports' => $airports,
        ]);
    }
}

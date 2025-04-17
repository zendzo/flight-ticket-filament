<?php

namespace App\Http\Controllers;

use App\Interfaces\AirlineRepositoryInterface;
use App\Interfaces\AirportRepositoryInterface;
use App\Interfaces\FlightRepositoryInterface;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(
      Request $request,
      AirportRepositoryInterface $airportRepository, 
      AirlineRepositoryInterface $airlineRepository, 
      FlightRepositoryInterface $flightRepository
      )
    {
        $departureAirport = $airportRepository->getAirportByIataCode($request->input('departure'));
        $arrivalAirport = $airportRepository->getAirportByIataCode($request->input('arrival'));
        $airlines = $airlineRepository->getAll();
        $flights = $flightRepository->getAllFlights([
          'daparture' => $departureAirport ? $departureAirport->id : null,
          'arrival' => $arrivalAirport ? $arrivalAirport->id : null,
          'date' => $request->input('date'),
          'quantity' => $request->input('quantity'),
        ]);
        return view('pages.flight.index',[
          'flights' => $flights,
          'airlines' => $airlines,
          'departureAirport' => $departureAirport,
          'arrivalAirport' => $arrivalAirport,
        ]);
    }
}

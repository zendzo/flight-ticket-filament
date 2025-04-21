<?php

namespace App\Http\Controllers;

use App\Interfaces\FlightRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
  public function checkBooking(Request $request)
  {
    return view('pages.booking.check');
  }

  public function booking(Request $request, $flightNumber, TransactionRepositoryInterface $transactionRepository)
  {
    $transactionRepository->saveTransactionDataToSession($request->all());

    return redirect()->route('booking.choose-seat', [
      'flightNumber' => $flightNumber,
    ]);
  }

  public function chooseSeat($flightNumber, TransactionRepositoryInterface $transactionRepository, FlightRepositoryInterface $flightRepository)
  {
    $transaction = $transactionRepository->getTransactionsDataFromSession();
    dd(session()->all());
    $flight = $flightRepository->getFlightsByFlightNumber($flightNumber);
    $tier = $flight->classes->find($transaction['flight_class_id']);
    if (!$transaction) {
      return redirect()->route('booking.check');
    }
    return view('pages.booking.choose-seat', [
      'flight' => $flight,
      'transaction' => $transaction,
      'tier' => $tier,
    ]);
  }
}

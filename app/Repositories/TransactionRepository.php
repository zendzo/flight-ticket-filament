<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\FlightClass;
use App\Models\PromoCode;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface {

  public function getTransactionsDataFromSession()
  {
    return session()->get('transaction');
  }

  public function saveTransactionDataToSession($data)
  {
    $transactions = session()->get('transaction');

    foreach ($transactions as $key => $value) {
      $transaction[$key] = $value;
    }

    session()->put('transaction', $transaction);
  }

  public function saveTransaction($transaction)
  {
    $data['code'] = $this->generateTransactionCode();
    $data['total_passengers'] = $this->countPassengers($data['passengers']);

    $data['subtotal'] = $this->calculateSubtotal($data['flight_class_id'], $data['total_passengers']);
    $data['grandtotal'] = $data['grandtotal'];

    if(!empty($data['promo_code'])) {
      $data = $this->applyPromoCode($data);
    }

    $data['grandtotal'] = $this->addTax($data['grandtotal']);

    $transaction = $this->createTransaction($data);
  }

  public function getTransactionByCode($code)
  {

  }

  public function getTransactionByCodeWithPassengers($code, $email, $phone)
  {

  }

  private function generateTransactionCode()
  {
    return "TRX-" . uniqid();
  }

  private function countPassengers($passengers)
  {
    return count($passengers);
  }

  private function calculateSubtotal($flight_class_id, $total_passengers)
  {
    $price = FlightClass::findorFail($flight_class_id)->price;
    return $price * $total_passengers;
  }

  private function applyPromoCode($promoCode)
  {
    $promo = PromoCode::where('code', $promoCode)
        ->where('valid_until', '>=', now())
        ->where('is_available', false)
        ->first();

    if($promo) {
      
    }
  }

  private function addTax($grandtotal)
  {
    return $grandtotal + ($grandtotal * 0.1);
  }

  private function createTransaction($data)
  {
    return Transaction::create($data);
  }
}
<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\FlightClass;
use App\Models\PromoCode;
use App\Models\Transaction;
use App\Models\TransactionPassenger;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactionsDataFromSession()
    {
        return session()->get('transaction');
    }

    public function saveTransactionDataToSession($data)
    {
        $transactions = session()->get('transaction', []);

        foreach ($data as $key => $value) {
            $transactions[$key] = $value;
        }

        session()->put('transaction', $transactions);
    }

    public function saveTransaction($transaction)
    {
        $data['code'] = $this->generateTransactionCode();
        $data['total_passengers'] = $this->countPassengers($data['passengers']);

        $data['subtotal'] = $this->calculateSubtotal($data['flight_class_id'], $data['total_passengers']);
        $data['grandtotal'] = $data['subtotal'];

        if (! empty($data['promo_code'])) {
            $data = $this->applyPromoCode($data);
        }

        $data['grandtotal'] = $this->addTax($data['grandtotal']);

        $transaction = $this->createTransaction($data);
        $this->savePassengers($data['passengers'], $transaction->id);
        session()->forget('transaction');

        return $transaction;
    }

    public function getTransactionByCode($code)
    {
        return Transaction::where('code', $code)->first();
    }

    public function getTransactionByCodeEmailPhone($code, $email, $phone)
    {
        return Transaction::where('code', $code)
            ->where('email', $email)
            ->where('phone', $phone)
            ->first();
    }

    private function generateTransactionCode()
    {
        return 'MEBGARUDA'.rand(1000, 9999).date('Ymd');
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

    private function applyPromoCode($data)
    {
        $promo = PromoCode::where('code', $data['promo_code'])
            ->where('valid_until', '>=', now())
            ->where('is_available', true)
            ->first();

        if ($promo) {
            if ($promo->discount_type == 'percentage') {
                $data['discount'] = $data['grandtotal'] * ($promo->discount_value / 100);
            } else {
                $data['grandtotal'] = $promo->discount_value;
            }
            $data['grandtotal'] = $data['grandtotal'] - $data['discount'];
            $data['promo_code_id'] = $promo->id;

            $promo->update([
                'is_available' => false,
            ]);
        }

        return $data;
    }

    private function addTax($grandtotal)
    {
        return $grandtotal + ($grandtotal * 0.1);
    }

    private function createTransaction($data)
    {
        return Transaction::create($data);
    }

    private function savePassengers($passengers, $transaction_id)
    {
        foreach ($passengers as $passenger) {
            $passenger['transaction_id'] = $transaction_id;
            TransactionPassenger::create($passenger);
        }
    }
}

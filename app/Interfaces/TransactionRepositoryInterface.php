<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface {

  public function getTransactionsDataFromSession();

  public function saveTransactionDataToSession($data);

  public function saveTransaction($transaction);

  public function getTransactionByCode($code);

  public function getTransactionByCodeWithPassengers($code, $email, $phone);
}
<?php

namespace App\Repositories;

use App\Models\Room;
use App\Models\Transaction;
use App\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactionDataFromSession()
    {
        return session()->get('transaction');
    }

    public function saveTransactionDataToSession($data)
    {
        $transaction = session()->get('transaction', []);

        foreach ($data as $key => $value) {
            $transaction[$key] = $value;
        }

        session()->put('transaction', $transaction);
    }

    public function saveTransaction($data)
    {

        $room = Room::find($data['room_id']);

        $data = $this->prepareTransactiondata($data, $room);

        $transaction = Transaction::create($data);

        session()->forget('transaction');

        return $transaction;
    }

    public function getTransactionByCode($code)
    {
        return Transaction::where('code', $code)->first();
    }

    public function getTransactionByCodeEmailPhone($code, $email, $phone)
    {
        return Transaction::where('code', $code)->where('email', $email)->where('phone', $phone)->first();
    }

    private function prepareTransactiondata($data, $room)
    {
        $data['code'] = $this->generateTransactionCode();
        $data['payment_status'] = 'pending';
        $data['transaction_date'] = now();

        $total = $this->calculateTotalAmount($room->price_per_month, $data['duration']);
        $data['total_amount'] = $this->calculatePaymentAmount($total, $data['payment_methode']);

        return $data;

    }

    private function generateTransactionCode()
    {
        return 'AFSSR' . rand(1000000, 9999999);
    }

    private function calculateTotalAmount($pricePerMonth, $duration)
    {
        $subtotal = $pricePerMonth * $duration;
        $tax = $subtotal * 0.11;
        $insurance = $subtotal * 0.01;
        return $subtotal + $tax + $insurance;
    }

    private function calculatePaymentAmount($total, $paymentMethode)
    {
        return $paymentMethode === 'full_payment' ? $total : $total * 0.3;
    }

}
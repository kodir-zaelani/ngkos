<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingShowRequest;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Http\Requests\CustomerInformationStoreRequest;

class BookingController extends Controller
{
    private BoardingHouseRepositoryInterface $boardinghouseRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(BoardingHouseRepositoryInterface $boardinghouseRepository, TransactionRepositoryInterface $transactionRepository)
    {
        $this->boardinghouseRepository = $boardinghouseRepository;
        $this->transactionRepository   = $transactionRepository;
    }


    public function booking(Request $request, $slug)
    {
        // dd($request->all());

        $this->transactionRepository->saveTransactionDataToSession($request->all());
        return redirect()->route('booking.information', $slug);
    }
    public function information($slug)
    {
        $transaction   = $this->transactionRepository->getTransactionDataFromSession();
        $boardinghouse = $this->boardinghouseRepository->getBoardingHouseBySlug($slug);
        $room          = $this->boardinghouseRepository->getBoardingHouseRoomById($transaction['room_id']);
        return view('pages.booking.customer-information', compact('transaction', 'boardinghouse', 'room'));
    }

    public function saveInformation(CustomerInformationStoreRequest $request, $slug)
    {
        $data = $request->validated();

        $this->transactionRepository->saveTransactionDataToSession($data);

        return redirect()->route('booking.checkout', $slug);
    }

    public function checkout($slug)
    {
        $transaction   = $this->transactionRepository->getTransactionDataFromSession();
        $boardinghouse = $this->boardinghouseRepository->getBoardingHouseBySlug($slug);
        $room          = $this->boardinghouseRepository->getBoardingHouseRoomById($transaction['room_id']);

        return view('pages.booking.checkout', compact('transaction', 'boardinghouse', 'room'));
    }

    public function payment(Request $request)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());

        $transaction = $this->transactionRepository->saveTransaction($this->transactionRepository->getTransactionDataFromSession());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverkey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isproduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.issanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds =  config('midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id'     => $transaction->code,
                'gross_amount' => $transaction->total_amount,
            ],
            'customer_details'  => [
                'first_name' => $transaction->name,
                'email'      => $transaction->email,
                'phone'      => $transaction->phone,
            ],
        ];

        // Get Snap Payment Page URL
        $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

        return redirect($paymentUrl);
    }

    public function success(Request $request)
    {
        $transaction = $this->transactionRepository->getTransactionByCode($request->order_id);

        if (!$transaction) {
           return redirect()->route('root');
        }
        return view('pages.booking.success', compact('transaction'));
    }

     public function checkBooking()
    {
        return view('pages.booking.find-booking');
    }

    public function show(BookingShowRequest $request)
    {
        return view('pages.booking.detail');
    }

}

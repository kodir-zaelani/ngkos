<?php

namespace App\Http\Controllers\Api;

use Twilio\Rest\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverkey');
        $hasedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hasedKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        $transactionStatus = $request->transaction_status;
        $orderId = $request->order_id;
        $transaction = Transaction::where('code', $orderId)->first();

         if (!$transaction) {
            return response()->json(['message' => 'Transaction Not Found'], 404);
        }

        // Twillio Whatapps
        $sid    = "ACd55acf358704572a7c6d04fae93939d7";
        $token  = "c162df75d8ec75f45bc860241c06f153";
        $twilio = new Client($sid, $token);

        $message =
        "Halo, " . $transaction->name . "!" . PHP_EOL . PHP_EOL .
        "Kami telah menerima pembayaran anda dengan kode booking: " . $transaction->code . "." . PHP_EOL .
        "Total pembayaran: Rp " . number_format($transaction->total_amount, 0, ',', '.') . PHP_EOL . PHP_EOL .
        "Anda bisa datang ke kos: " . $transaction->boardinghouse->name . PHP_EOL .
        "Alamat: " . $transaction->boardinghouse->address . PHP_EOL .
        "Mulai tangga; " . date('d-m-Y', strtotime($transaction->start_date)) . PHP_EOL . PHP_EOL .
        "Terima kasih atas kepercayaan Anda! " . PHP_EOL .
        "Kami tunggu kedatangan Anda.";

        switch ($transactionStatus) {
            case 'capture':
                if ($request->payment_type == 'credit_card') {
                    if ($request->fraud_status == 'challenge') {
                        $transaction->update(['payment_status' => 'pending']);
                    } else {
                        $transaction->update(['payment_status' => 'success']);
                    }
                }
                break;
                case 'settlement':
                    $transaction->update(['payment_status' => 'success']);


                    break;
                case 'pending':
                    $transaction->update(['payment_status' => 'pending']);
                    break;
                case 'deny':
                    $transaction->update(['payment_status' => 'failed']);
                    break;
                case 'expire':
                    $transaction->update(['payment_status' => 'expired']);
                    break;
                case 'cancel':
                    $transaction->update(['payment_status' => 'canceled']);
                    break;
            default:
                transaction->update(['payment_status' => 'unknown']);
                break;
        }

        return response()->json(['message' => 'Callback received successfully']);
    }
}
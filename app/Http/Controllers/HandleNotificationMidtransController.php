<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class HandleNotificationMidtransController extends Controller
{
    public function handle(Request $request)
    {


        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            if ($fraud == 'accept') {
                Donasi::where('id', $order_id)->update([
                    'status' => 1,
                ]);
            }
        } else if ($transaction == 'settlement') {
            Donasi::where('id', $order_id)->update([
                'status' => 1,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Midtrans: Notification success',
        ], 200);


    }
}

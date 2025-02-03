<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client;
use MongoDB\BSON\ObjectId;
use Illuminate\Support\Facades\Log;


class PaymentController extends Controller
{
    public function showPaymentForm($orderId)
    {
        $mongoClient = new Client(env('MONGO_DB_CONNECTION_STRING'));
        $db = $mongoClient->selectDatabase('PPevent');
        $ordersCollection = $db->orders;

        $order = $ordersCollection->findOne(['_id' => new \MongoDB\BSON\ObjectId($orderId)]);

        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Order not found.');
        }

        return view('Users.payment', compact('order'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $mongoClient = new Client(env('MONGO_DB_CONNECTION_STRING'));
        $db = $mongoClient->selectDatabase('PPevent');
        $ordersCollection = $db->orders;

        $order = $ordersCollection->findOne(['_id' => new \MongoDB\BSON\ObjectId($request->order_id)]);

        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Order not found.');
        }

        $ordersCollection->updateOne(
            ['_id' => $order->_id],
            ['$set' => ['status' => 'paid', 'payment_method' => $request->payment_method, 'paid_at' => now()]]
        );

        Log::info('Payment successful', ['order_id' => $request->order_id]);

        return redirect()->route('cart.index')->with('success', 'Payment successful!');
    }
}

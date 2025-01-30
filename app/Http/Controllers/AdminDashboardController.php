<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get the count of ticket purchases
        $ticketCount = Tickets::count();

        // Get the count of product purchases
        $productCount = Order::count();

        // Pass the data to the view
        return view('Admin.dashboard', compact('ticketCount', 'productCount'));
    }
}
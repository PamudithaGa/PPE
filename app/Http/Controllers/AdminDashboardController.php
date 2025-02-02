<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use App\Models\Tickets;
use App\Models\Order;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $ticketCount = Tickets::count();
        $productCount = Order::count();
        $ordersCount = Order::count();
        $bookingsCount = bookings::count();
        $totalRevenue = Order::sum('total_amount');
        $subscriptionCount = Subscription::count();

        $months = collect(range(0, 5))->map(function ($i) {
            return Carbon::now()->subMonths($i)->format('M');
        })->reverse()->values();

        $ordersData = Order::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => [
                            'year'  => ['$year' => '$created_at'],
                            'month' => ['$month' => '$created_at']
                        ],
                        'count' => ['$sum' => 1]
                    ]
                ]
            ]);
        });

        $ordersByMonth = collect($months)->map(function ($month) use ($ordersData) {
            return $ordersData->firstWhere('_id.month', Carbon::parse($month)->month)?->count ?? 0;
        });

        // Bookings count per month
        $bookingsData = Bookings::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => [
                            'year'  => ['$year' => '$created_at'],
                            'month' => ['$month' => '$created_at']
                        ],
                        'count' => ['$sum' => 1]
                    ]
                ]
            ]);
        });

        $bookingsByMonth = collect($months)->map(function ($month) use ($bookingsData) {
            return $bookingsData->firstWhere('_id.month', Carbon::parse($month)->month)?->count ?? 0;
        });

        return view('Admin.dashboard', compact(
            'ticketCount', 'productCount', 'ordersCount', 'bookingsCount', 'totalRevenue', 'subscriptionCount',
            'months', 'ordersByMonth', 'bookingsByMonth'
        ));
    }
}

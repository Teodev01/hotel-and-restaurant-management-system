<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $today = today()->toDateString();

        // Rooms
        $totalRooms     = Room::count();
        $availableRooms = Room::where('status', 'available')->count();
        $occupiedRooms  = Room::where('status', 'occupied')->count();

        // Reservations
        $todayCheckins      = Reservation::whereDate('check_in', $today)->count();
        $activeReservations = Reservation::whereIn('status', ['reserved', 'checked_in'])->count();

        // Restaurant
        $todayOrders = Order::whereDate('created_at', $today)->count();
        $todaySales  = Order::whereDate('created_at', $today)->where('status', 'paid')->sum('total');

        $recentOrders = Order::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalRooms', 'availableRooms', 'occupiedRooms',
            'todayCheckins', 'activeReservations',
            'todayOrders', 'todaySales', 'recentOrders'
        ));
    }
}
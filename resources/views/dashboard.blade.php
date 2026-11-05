@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    <div class="cards">
        <div class="card">
            <h3>Total Rooms</h3>
            <p>{{ $totalRooms }}</p>
        </div>
        <div class="card">
            <h3>Available Rooms</h3>
            <p>{{ $availableRooms }}</p>
        </div>
        <div class="card">
            <h3>Occupied Rooms</h3>
            <p>{{ $occupiedRooms }}</p>
        </div>
        <div class="card">
            <h3>Check-ins Today</h3>
            <p>{{ $todayCheckins }}</p>
        </div>
        <div class="card">
            <h3>Active Reservations</h3>
            <p>{{ $activeReservations }}</p>
        </div>
        <div class="card">
            <h3>Orders Today</h3>
            <p>{{ $todayOrders }}</p>
        </div>
        <div class="card">
            <h3>Sales Today (Paid)</h3>
            <p>₱{{ number_format($todaySales, 2) }}</p>
        </div>
    </div>

    <h2>Recent Orders</h2>
    <table>
        <tr>
            <th>Order #</th>
            <th>Table</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
        @forelse($recentOrders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->table_no }}</td>
            <td>₱{{ number_format($order->total, 2) }}</td>
            <td>{{ $order->status }}</td>
        </tr>
        @empty
        <tr><td colspan="4">No orders yet.</td></tr>
        @endforelse
    </table>
@endsection
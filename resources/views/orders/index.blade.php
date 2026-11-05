@extends('layouts.app')
@section('title', 'Orders')

@section('content')
    <h1>Orders</h1>
    <a href="/orders/create" class="btn">+ New Order</a><br><br>

    <table>
        <tr>
            <th>Order #</th>
            <th>Table</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->table_no }}</td>
            <td>₱{{ number_format($order->total, 2) }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at->format('M d, h:i A') }}</td>
            <td>
                <a href="/orders/{{ $order->id }}" class="btn">View</a>

                @if($order->status == 'pending')
                    <form method="POST" action="/orders/{{ $order->id }}/status" style="display:inline">
                        @csrf
                        <input type="hidden" name="status" value="served">
                        <button class="btn">Served</button>
                    </form>
                @elseif($order->status == 'served')
                    <form method="POST" action="/orders/{{ $order->id }}/status" style="display:inline">
                        @csrf
                        <input type="hidden" name="status" value="paid">
                        <button class="btn">Paid</button>
                    </form>
                @endif

                @if(auth()->user()->role == 'admin')
                    <form method="POST" action="/orders/{{ $order->id }}" style="display:inline"
                          onsubmit="return confirm('Delete this order?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection
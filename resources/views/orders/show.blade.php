@extends('layouts.app')
@section('title', 'Order Details')

@section('content')
    <h1>Order #{{ $order->id }}</h1>
    <p>Table: {{ $order->table_no }} | Status: {{ $order->status }}</p>

    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
        @foreach($order->items as $line)
        <tr>
            <td>{{ $line->menuItem->name }}</td>
            <td>₱{{ number_format($line->menuItem->price, 2) }}</td>
            <td>{{ $line->qty }}</td>
            <td>₱{{ number_format($line->subtotal, 2) }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3">Total</th>
            <th>₱{{ number_format($order->total, 2) }}</th>
        </tr>
    </table><br>

    <a href="/orders" class="btn">Back</a>
@endsection
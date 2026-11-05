@extends('layouts.app')
@section('title', 'New Order')

@section('content')
    <h1>New Order</h1>

    @if($errors->any())
        <div style="color:red">
            @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="/orders">
        @csrf

        <label>Table No</label><br>
        <input type="text" name="table_no" value="{{ old('table_no') }}"><br>

        <table>
            <tr>
                <th>Item</th>
                <th>Category</th>
                <th>Price</th>
                <th>Qty</th>
            </tr>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>₱{{ number_format($item->price, 2) }}</td>
                <td><input type="number" name="qty[{{ $item->id }}]" value="0" min="0" style="width:80px"></td>
            </tr>
            @endforeach
        </table><br>

        <button type="submit" class="btn">Save Order</button>
    </form>
@endsection
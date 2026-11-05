@extends('layouts.app')
@section('title', 'Menu')

@section('content')
    <h1>Menu</h1>
    <a href="/menu/create" class="btn">+ Add Item</a><br><br>

    <table>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Available</th>
            <th>Action</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category }}</td>
            <td>₱{{ number_format($item->price, 2) }}</td>
            <td>{{ $item->is_available ? 'Yes' : 'No' }}</td>
            <td>
                <a href="/menu/{{ $item->id }}/edit" class="btn">Edit</a>

                @if(auth()->user()->role == 'admin')
                <form method="POST" action="/menu/{{ $item->id }}" style="display:inline"
                      onsubmit="return confirm('Delete this item?')">
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
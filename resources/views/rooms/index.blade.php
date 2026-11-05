@extends('layouts.app')
@section('title', 'Rooms')

@section('content')
    <h1>Rooms</h1>
    <a href="/rooms/create" class="btn">+ Add Room</a><br><br>

    <table>
        <tr>
            <th>Room No</th>
            <th>Type</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($rooms as $room)
        <tr>
            <td>{{ $room->room_no }}</td>
            <td>{{ $room->type }}</td>
            <td>₱{{ number_format($room->price, 2) }}</td>
            <td>{{ $room->status }}</td>
            <td>
                <a href="/rooms/{{ $room->id }}/edit" class="btn">Edit</a>

                @if(auth()->user()->role == 'admin')
                <form method="POST" action="/rooms/{{ $room->id }}" style="display:inline"
                      onsubmit="return confirm('Delete this room?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection
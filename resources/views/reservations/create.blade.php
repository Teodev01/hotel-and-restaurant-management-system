@extends('layouts.app')
@section('title', 'New Reservation')

@section('content')
    <h1>New Reservation</h1>

    @if($errors->any())
        <div style="color:red">
            @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="/reservations">
        @csrf

        <label>Guest Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>

        <label>Phone</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}"><br>

        <label>Email (optional)</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br>

        <label>Room</label><br>
        <select name="room_id">
            @foreach($rooms as $room)
                <option value="{{ $room->id }}">
                    {{ $room->room_no }} - {{ $room->type }} (₱{{ number_format($room->price, 2) }}/night)
                </option>
            @endforeach
        </select><br>

        <label>Check-in</label><br>
        <input type="date" name="check_in" value="{{ old('check_in') }}"><br>

        <label>Check-out</label><br>
        <input type="date" name="check_out" value="{{ old('check_out') }}"><br>

        <button type="submit" class="btn">Save Reservation</button>
    </form>
@endsection
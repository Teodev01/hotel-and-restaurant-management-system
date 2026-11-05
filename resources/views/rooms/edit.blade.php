@extends('layouts.app')
@section('title', 'Edit Room')

@section('content')
    <h1>Edit Room</h1>

    @if($errors->any())
        <div style="color:red">
            @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="/rooms/{{ $room->id }}">
        @csrf
        @method('PUT')

        <label>Room No</label><br>
        <input type="text" name="room_no" value="{{ $room->room_no }}"><br>

        <label>Type</label><br>
        <select name="type">
            @foreach(['Single', 'Double', 'Suite'] as $t)
                <option {{ $room->type == $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select><br>

        <label>Price per night</label><br>
        <input type="number" step="0.01" name="price" value="{{ $room->price }}"><br>

        <label>Status</label><br>
        <select name="status">
            @foreach(['available', 'occupied', 'maintenance'] as $s)
                <option value="{{ $s }}" {{ $room->status == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
        </select><br>

        <button type="submit" class="btn">Update</button>
    </form>
@endsection
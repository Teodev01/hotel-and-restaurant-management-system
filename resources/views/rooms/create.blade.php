@extends('layouts.app')
@section('title', 'Add Room')

@section('content')
    <h1>Add Room</h1>

    @if($errors->any())
        <div style="color:red">
            @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="/rooms">
        @csrf

        <label>Room No</label><br>
        <input type="text" name="room_no" value="{{ old('room_no') }}"><br>

        <label>Type</label><br>
        <select name="type">
            <option>Single</option>
            <option>Double</option>
            <option>Suite</option>
        </select><br>

        <label>Price per night</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}"><br>

        <label>Status</label><br>
        <select name="status">
            <option value="available">Available</option>
            <option value="occupied">Occupied</option>
            <option value="maintenance">Maintenance</option>
        </select><br>

        <button type="submit" class="btn">Save</button>
    </form>
@endsection
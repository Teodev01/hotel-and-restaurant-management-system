@extends('layouts.app')
@section('title', 'Reservations')

@section('content')
    <h1>Reservations</h1>
    <a href="/reservations/create" class="btn">+ New Reservation</a><br><br>

    <table>
        <tr>
            <th>Guest</th>
            <th>Phone</th>
            <th>Room</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($reservations as $r)
        <tr>
            <td>{{ $r->guest->name }}</td>
            <td>{{ $r->guest->phone }}</td>
            <td>{{ $r->room->room_no }}</td>
            <td>{{ $r->check_in }}</td>
            <td>{{ $r->check_out }}</td>
            <td>₱{{ number_format($r->total, 2) }}</td>
            <td>{{ $r->status }}</td>
            <td>
                @if($r->status == 'reserved')
                    <form method="POST" action="/reservations/{{ $r->id }}/status" style="display:inline">
                        @csrf
                        <input type="hidden" name="status" value="checked_in">
                        <button class="btn">Check-in</button>
                    </form>
                    <form method="POST" action="/reservations/{{ $r->id }}/status" style="display:inline">
                        @csrf
                        <input type="hidden" name="status" value="cancelled">
                        <button class="btn btn-danger">Cancel</button>
                    </form>
                @elseif($r->status == 'checked_in')
                    <form method="POST" action="/reservations/{{ $r->id }}/status" style="display:inline">
                        @csrf
                        <input type="hidden" name="status" value="checked_out">
                        <button class="btn">Check-out</button>
                    </form>
                @endif

                @if(auth()->user()->role == 'admin')
                    <form method="POST" action="/reservations/{{ $r->id }}" style="display:inline"
                          onsubmit="return confirm('Delete this reservation?')">
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
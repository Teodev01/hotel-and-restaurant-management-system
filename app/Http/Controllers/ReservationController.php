<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['guest', 'room'])->latest()->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::where('status', '!=', 'maintenance')->get();
        return view('reservations.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => 'required',
            'room_id'   => 'required',
            'check_in'  => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Block double-booking
        $taken = Reservation::where('room_id', $request->room_id)
            ->whereIn('status', ['reserved', 'checked_in'])
            ->where('check_in', '<', $request->check_out)
            ->where('check_out', '>', $request->check_in)
            ->exists();

        if ($taken) {
            return back()->withInput()
                ->withErrors(['room_id' => 'This room is already booked for those dates.']);
        }

        $guest = Guest::create($request->only('name', 'phone', 'email'));

        $room   = Room::find($request->room_id);
        $nights = (new \DateTime($request->check_in))->diff(new \DateTime($request->check_out))->days;

        Reservation::create([
            'guest_id'  => $guest->id,
            'room_id'   => $room->id,
            'check_in'  => $request->check_in,
            'check_out' => $request->check_out,
            'status'    => 'reserved',
            'total'     => $nights * $room->price,
        ]);

        return redirect('/reservations')->with('success', 'Reservation saved!');
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $reservation->update(['status' => $request->status]);

        if ($request->status == 'checked_in') {
            $reservation->room->update(['status' => 'occupied']);
        }
        if (in_array($request->status, ['checked_out', 'cancelled'])) {
            $reservation->room->update(['status' => 'available']);
        }

        return back()->with('success', 'Status updated!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('/reservations')->with('success', 'Reservation deleted!');
    }
}
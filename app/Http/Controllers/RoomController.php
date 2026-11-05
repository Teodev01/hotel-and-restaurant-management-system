<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_no' => 'required|unique:rooms',
            'type'    => 'required',
            'price'   => 'required|numeric',
            'status'  => 'required',
        ]);

        Room::create($request->all());
        return redirect('/rooms')->with('success', 'Room added!');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_no' => 'required|unique:rooms,room_no,' . $room->id,
            'type'    => 'required',
            'price'   => 'required|numeric',
            'status'  => 'required',
        ]);

        $room->update($request->all());
        return redirect('/rooms')->with('success', 'Room updated!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('/rooms')->with('success', 'Room deleted!');
    }
}
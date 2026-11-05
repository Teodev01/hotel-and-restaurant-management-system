<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $items = MenuItem::all();
        return view('menu.index', compact('items'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'category' => 'required',
            'price'    => 'required|numeric',
        ]);

        MenuItem::create([
            'name'         => $request->name,
            'category'     => $request->category,
            'price'        => $request->price,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect('/menu')->with('success', 'Menu item added!');
    }

    public function edit(MenuItem $menu_item)
    {
        return view('menu.edit', compact('menu_item'));
    }

    public function update(Request $request, MenuItem $menu_item)
    {
        $request->validate([
            'name'     => 'required',
            'category' => 'required',
            'price'    => 'required|numeric',
        ]);

        $menu_item->update([
            'name'         => $request->name,
            'category'     => $request->category,
            'price'        => $request->price,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect('/menu')->with('success', 'Menu item updated!');
    }

    public function destroy(MenuItem $menu_item)
    {
        $menu_item->delete();
        return redirect('/menu')->with('success', 'Menu item deleted!');
    }
}
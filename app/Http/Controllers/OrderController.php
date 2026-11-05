<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $items = MenuItem::where('is_available', true)->get();
        return view('orders.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_no' => 'required',
        ]);

        // Keep only the items with quantity above 0
        $qtys = collect($request->qty ?? [])->filter(fn ($q) => $q > 0);

        if ($qtys->isEmpty()) {
            return back()->withInput()
                ->withErrors(['qty' => 'Please choose at least one item.']);
        }

        $order = Order::create([
            'table_no' => $request->table_no,
            'total'    => 0,
            'status'   => 'pending',
        ]);

        $total = 0;
        foreach ($qtys as $menuItemId => $qty) {
            $menuItem = MenuItem::find($menuItemId);
            $subtotal = $menuItem->price * $qty;

            OrderItem::create([
                'order_id'     => $order->id,
                'menu_item_id' => $menuItem->id,
                'qty'          => $qty,
                'subtotal'     => $subtotal,
            ]);

            $total += $subtotal;
        }

        $order->update(['total' => $total]);

        return redirect('/orders')->with('success', 'Order saved!');
    }

    public function show(Order $order)
    {
        $order->load('items.menuItem');
        return view('orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status updated!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/orders')->with('success', 'Order deleted!');
    }
}
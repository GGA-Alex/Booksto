<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $orders = Order::all();
        return view('Booksto.Admin.order.orderAdmin_index',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $ordenes_usuario)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $items = json_decode($ordenes_usuario->content);
        return view('Booksto.Admin.order.orderAdmin_edit',compact('ordenes_usuario','items'));
    }
}

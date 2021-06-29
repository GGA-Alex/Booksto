<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Order;

class CreateOrderController extends Controller
{
    

    public function index()
    {
        return view('Booksto.User.order');
    }

    public function payment(Order $orden)
    {
        $items = json_decode($orden->content);

        return view('Booksto.User.order_payment',compact('orden','items'));
    }

}

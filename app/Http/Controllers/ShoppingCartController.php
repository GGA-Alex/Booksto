<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        return view('Booksto.User.Shopping cart.CartDetails');
    }
}

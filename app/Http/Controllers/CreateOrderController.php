<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Models\State;

class CreateOrderController extends Controller
{
    public function index()
    {
        $states = State::all();
        $municipialities = Municipality::all();
        return view('Booksto.User.order', compact('states', 'municipialities'));
    }
}

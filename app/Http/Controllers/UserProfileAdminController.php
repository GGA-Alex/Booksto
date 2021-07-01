<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileAdminController extends Controller
{
    public function index(){
        return view('Booksto.admin.user_show');
    }
}

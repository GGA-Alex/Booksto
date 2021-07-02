<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserProfileAdminController extends Controller
{
    public function index(){
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.admin.user_show');
    }
}

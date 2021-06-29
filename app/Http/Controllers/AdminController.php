<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Editorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index(){
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $books = Book::all();
        $users = User::all();
        $editorials = Editorial::all();
        return view('Booksto.Admin.admin_index',compact('books','users','editorials'));
    }
}

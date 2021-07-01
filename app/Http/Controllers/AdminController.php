<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Editorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index(){
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $booksPublished = Book::where('status','1')->count();
        $booksNotPublished = Book::where('status','2')->count();
        $users = User::count();
        $editorials = Editorial::count();
        $categories = Category::count();
        $orders = Order::with('user')->where('status','2')->limit(10)->get();
        return view('Booksto.Admin.admin_index',compact('booksPublished','booksNotPublished','users','editorials','categories','orders'));
    }
}

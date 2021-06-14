<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class CategoryController extends Controller
{
    public function show()
    {
        // $books = Book::where('category_id', $category)->get();
        $books = Book::where('category_id', '1')->get();
        $categories = Category::all();
        return view('Booksto.User.categoryPage', compact('books', 'categories'));
    }
}

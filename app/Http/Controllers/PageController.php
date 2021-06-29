<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class PageController extends Controller
{
    public function HomePage()
    {
        $books = Category::first()->books->where('status','1');
        $authors = Author::all();
        $categories = Category::all();
        return view('Booksto.User.index', compact('books', 'authors', 'categories'));
    }

    public function BookPage(Book $book)
    {
        $categories = Category::all();
        return view('Booksto.User.bookPage', compact('book', 'categories'));
    }

    public function show()
    {
        $categories = Category::all();
        return view('Booksto.User.categoryPage', compact('categories'));
    }

    public function showCategory(Category $categoria)
    {
        return view('Booksto.User.categoryShow', compact('categoria'));
    }
}

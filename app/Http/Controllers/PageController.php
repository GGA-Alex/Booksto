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

        $books = Category::first()->books;
        $authors = Author::all();
        $categories = Category::all();
        return view('Booksto.User.index', compact('books', 'authors', 'categories'));
    }

    public function BookPage(Book $book)
    {
        $categories = Category::all();
        return view('Booksto.User.bookPage', compact('book', 'categories'));
    }
}

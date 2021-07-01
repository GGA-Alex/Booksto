<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PageController extends Controller
{
    public function HomePage()
    {
        if(auth()->user()){
            if($tipo = auth()->user()->tipo == 'Admin'){
                return redirect()->route('admin.index');
            }else{
                $pendiente = Order::where('status','1')->where('user_id',auth()->user()->id)->count();
            }
        }else{
            $pendiente = 0;
        }
        $books = Book::with('authors', 'images')->where('category_id','1')->where('status','1')->get();
        $authors = Author::with('images')->get();
        return view('Booksto.User.index', compact('books', 'authors', 'pendiente'));
    }

    public function BookPage(Book $book)
    {
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        return view('Booksto.User.bookPage', compact('book'));
    }

    public function show()
    {
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        $categories = Category::with('books')->get();
        return view('Booksto.User.categoryPage', compact('categories'));
    }

    public function showCategory(Category $categoria)
    {
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        return view('Booksto.User.categoryShow', compact('categoria'));
    }
}

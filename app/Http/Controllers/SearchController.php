<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        $name = $request->name;

        $books = Book::where('nombre','like','%' . $name . '%')
                                ->where('status','1')
                                ->paginate(8);

        return view('Booksto.User.search', compact('books'));
    }
}

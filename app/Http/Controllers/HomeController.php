<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function  index()
    {
        $title = 'الكتب المتوفرة';
        $books = Book::paginate(12);
        return view('home' , compact('title' , 'books'));
    }

    public function  search(Request $request)
    {
        $title = __('نتائج البحث عن ') . ' : ' . "$request->searchname";
        $books = Book::where('title' , 'like' , "%$request->searchname%")->paginate(12);
        return view('home' , compact('title' , 'books'));
    }


    public function  show(Book $book)
    {
        return view('book.show' , compact('book'));
    }
}

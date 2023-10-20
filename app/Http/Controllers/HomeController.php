<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

    public function  books(Book $book)
    {
        $title = 'الكتب حسب فئة :' . $book->category->name;
        $books = Book::where('category_id' ,  $book->category->id )->paginate(12);
        return view('home' , compact('title' , 'books'));
    }

    public function  show(Book $book)
    {
        return view('book.show' , compact('book'));
    }



}

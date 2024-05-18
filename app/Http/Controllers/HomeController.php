<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
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

    public function  rate(Request $request , Book $book  )
    {
        if(auth()->user()->bookRating($book) == null) {
            $rating = new Rating();
            $rating->book_id =  $book->id;
            $rating->user_id =  auth()->user()->id;
            $rating->value =  $request->value;
            $rating->save();
        }else {
            $rate = auth()->user()->bookRating($book);
            $rate->value =  $request->value;
            $rate->save();
        }
    }
}

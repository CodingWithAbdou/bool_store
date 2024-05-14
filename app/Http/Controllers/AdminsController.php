<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $books = Book::all()->count();
        $authors = Author::all()->count();
        $publisher = Publisher::all()->count();
        $categories = Category::all()->count();
        return view('dashboard.home' , compact('books' , 'authors' , 'publisher' , 'categories'));
    }
}

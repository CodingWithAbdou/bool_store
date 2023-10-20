<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'المؤلفون ';
        $authors = Author::paginate(12);
        return view('authors.index'  , compact('title' , 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }


    public function search(Request $request)
    {
        $title = __('نتائج البحث  ') . ' : ' . "$request->searchname";
        $authors = Author::where('name' , 'like' , "%$request->searchname%")->paginate(12)->sortBy('name');
        return view('authors.index' , compact('title' , 'authors'));
    }
    public function  list(Author $author)
    {
        $title = ' الكتب التابعة للمؤلف :' . $author->name;
        $books = $author->books()->paginate(12);
        // dd($books);
        return view('home' , compact('title' , 'books'));
    }
}

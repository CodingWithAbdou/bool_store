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
    public function indexhome()
    {
        $authors = Author::all();
        return view('dashboard.author.index'  , compact('authors'));

    }
    public function create()
    {
        return view('dashboard.author.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request , [
            'name' => 'required',
        ]);

        $author = new author();

        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        session()->flash('flash_message', 'تمت إضافة المؤلف بنجاح');
        return redirect(route('authors.show' , $author));
    }

    /**
     * Display the specified resource.
     */
    public function show(author $author)
    {
        return view('dashboard.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(author $author)
    {
        return view('dashboard.author.edit' , compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,author $author)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
         $author->name = $request->name;
        $author->description = $request->description;


        $author->save();

        session()->flash('flash_message', 'تم تعديل المؤلف بنجاح');
        return redirect(route('authors.show', $author));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(author $author)
    {

        $author->delete();

        session()->flash('flash_message','تم حذف المؤلف بنجاح');

        return redirect(route('authors.admin.index'));

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

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'الناشرون ';
        $publishers = Publisher::paginate(12);
        return view('publisher.index'  , compact('title' , 'publishers'));

    }
    public function indexhome()
    {
        $publishers = Publisher::all();
        return view('dashboard.publisher.index'  , compact('publishers'));
    }


    public function create()
    {
        return view('dashboard.publisher.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request , [
            'name' => 'required',
        ]);

        $publisher = new publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->save();

        session()->flash('flash_message', 'تمت إضافة دار نشر بنجاح');
        return redirect(route('publishers.show' , $publisher));
    }

    /**
     * Display the specified resource.
     */
    public function show(publisher $publisher)
    {
        return view('dashboard.publisher.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publisher $publisher)
    {
        return view('dashboard.publisher.edit' , compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,publisher $publisher)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
         $publisher->name = $request->name;
        $publisher->address = $request->address;


        $publisher->save();

        session()->flash('flash_message', 'تم تعديل دار نشر بنجاح');
        return redirect(route('publishers.show', $publisher));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publisher $publisher)
    {

        $publisher->delete();

        session()->flash('flash_message','تم حذف دار نشر بنجاح');

        return redirect(route('publishers.admin.index'));

    }



    public function search(Request $request)
    {
        $title = __('نتائج البحث عن ') . ' : ' . "$request->searchname";
        $publishers = Publisher::where('name' , 'like' , "%$request->searchname%")->paginate(12);
        return view('publisher.index' , compact('title' , 'publishers'));
    }
    public function  list(Publisher $publisher)
    {
        $title = 'الكتب حسب الناشر :' . $publisher->name;
        $books = Book::where('publisher_id' ,  $publisher->id )->paginate(12);
        return view('home' , compact('title' , 'books'));
    }
}

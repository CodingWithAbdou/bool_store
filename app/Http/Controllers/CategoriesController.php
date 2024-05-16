<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class  CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexhome()
    {
        $categories = Category::all();
        return view('dashboard.category.index'  , compact('categories'));
    }
    public function index()
    {
        $title = 'التصنيفات ';
        $categories = Category::paginate(12);
        return view('category.index'  , compact('title' , 'categories'));
    }

    public function create()
    {
        return view('dashboard.category.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request , [
            'name' => 'required',
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        session()->flash('flash_message', 'تمت إضافة التصنيف بنجاح');
        return redirect(route('categories.show' , $category));
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
         $category->name = $request->name;
        $category->description = $request->description;


        $category->save();

        session()->flash('flash_message', 'تم تعديل التصنيف بنجاح');
        return redirect(route('categories.show', $category));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $category->delete();

        session()->flash('flash_message','تم حذف التصنيف بنجاح');

        return redirect(route('categories.admin.index'));

    }


    public function search(Request $request)
    {
        $title = __('نتائج البحث عن ') . ' : ' . "$request->searchname";
        $categories = Category::where('name' , 'like' , "%$request->searchname%")->paginate(12);
        return view('category.index' , compact('title' , 'categories'));
    }
    public function  list(Category $category)
    {
        $title = 'الكتب حسب تصميف فئة : ' . $category->name;
        $books =  $category->books()->paginate(12);
        return view('home' , compact('title' , 'books'));
    }


}

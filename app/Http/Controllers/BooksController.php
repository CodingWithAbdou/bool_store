<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait;

    public function index()
    {
        $books = Book::all();
        return view('dashboard.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('dashboard.books.create' , compact('authors' , 'publishers' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request , [
            'title' => 'required',
            'isbn' => ['required' , 'alpha_num' ,  Rule::unique('books','isbn') ],
            'cover_image' => 'required|image',
            'category' => 'nullable',
            'authors' => 'nullable',
            'publisher' => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        $book = new Book;

        $book->title = $request->title;
        $book->cover_image = $this->uploadImage( $request->cover_image );
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;
        $book->save();


        $book->authors()->attach($request->authors);

        session()->flash('flash_message', 'تمت إضافة الكتاب بنجاح');
        return redirect(route('book.show' , $book));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('dashboard.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('dashboard.books.edit', compact('book' , 'categories' , "publishers" , 'authors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required',
            'cover_image' => 'image',
            'category' => 'nullable',
            'authors' => 'nullable',
            'publisher' => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);
        $book->title = $request->title;
        if ($request->has ('cover_image')) {
            Storage::disk('public')->delete($book->cover_image);
            $book->cover_image = $this->uploadImage($request->cover_image);
        }
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;

        if ($book->isDirty('isbn')) {
            $this->validate($request, [
                'isbn' => ['required', 'alpha_num', Rule::unique('books', 'isbn')],
            ]);
        }

        $book->save();

        $book->authors()->detach();
        $book->authors()->attach($request->authors);
        session()->flash('flash_message', 'تم تعديل الكتاب بنجاح');
        return redirect(route('book.show', $book));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover_image);

        $book->delete();

        session()->flash('flash_message','تم حذف الكتاب بنجاح');

        return redirect(route('book.index'));

    }
}

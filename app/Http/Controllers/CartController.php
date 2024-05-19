<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request)
    {
        $book = Book::find($request->bookid);
        if(request()->has('isnew')) {
            auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies'=> $request->inputQuantity]);
            return;
        }
        if(auth()->user()->booksInCart->contains($book)) {
            $newQuantity = $request->inputQuantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
            if($newQuantity > $book->number_of_copies) {
                session()->flash('warning_message',  'لم تتم إضافة الكتاب، لقد تجاوزت عدد النسخ الموجودة لدينا، أقصى عدد موجود بإمكانك حجزه من هذا الكتاب هو ' . ($book->number_of_copies - auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies) . ' كتاب');
                return redirect()->back();
            } else {
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies'=> $newQuantity]);
            }
        } else {
            auth()->user()->booksInCart()->attach($request->bookid, ['number_of_copies'=> $request->inputQuantity]);
        }


        $num_of_product = auth()->user()->booksInCart()->count();

        return response()->json(['num_of_product' => $num_of_product]);
    }

    public function showCart() {

        $items = auth()->user()->booksInCart;
        return view('cart.showCart' , compact('items')) ;
    }

    public function removeItem(Request $request) {
        auth()->user()->booksInCart()->detach($request->id);
        return redirect()->back();
    }
}

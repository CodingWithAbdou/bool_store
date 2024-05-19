<?php

namespace App\Http\Controllers;

use App\Models\Shoping;
use Illuminate\Http\Request;

class ShopingsController extends Controller
{
    public function index()
    {
        $products = Shoping::where('bought' , TRUE)->get();

        return view('dashboard.shoping.index' ,compact( 'products'));
    }
}

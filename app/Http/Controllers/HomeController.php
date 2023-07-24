<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function AdminIndex()
    {
        return view('admin_home');
    }

    public function category(){
        // $categories=Category::all();
        $categories=Category::where('status',1)->get();
        return view('frontend.category',compact('categories'));
    }

    public function book(){
        $books=Book::all();
        return view('frontend.book',compact('books'));
    }

    public function bookDetails($id){
        $book=Book::find($id);
        return view('frontend.bookDetails',compact('book'));
    }
    public function readMore($id){
        // $book=Book::find($id);
        return view('frontend.checkout');
    }
}

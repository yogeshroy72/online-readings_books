<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function categoryBook($id){
        $category=Category::find($id);
        $books=Book::where('category_id',$id)->get();
        return view('frontend.category_book',compact('books','category'));
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
        $book=Book::find($id);
        return view('frontend.checkout',compact('book'));
    }
    public function purchasebook(){
        $purchaseBooks=Order::where('user_id',Auth::id())->get();
        // dd($purchaseBooks);

        return view('frontend.purchase_book',compact('purchaseBooks'));
    }
    public function searchbook(Request $request){
        $books=Book::where('name' ,'like','%'.$request->search.'%')->get();
        return view('frontend.search_book',compact('books'));
    }

    
}

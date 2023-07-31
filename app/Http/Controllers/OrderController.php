<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $request,$id){
        $purchaseBook=Order::where('user_id',Auth::id())->where('book_id',$id)->first();
        if($purchaseBook){
            return back()->with('message','Your Already purchase this Book');

        }



        $data=$request->validate([
            'phone'=>'required|numeric',
            'address'=>'required|string',
            'select_mode'=>'required'
        ]);
        $book=Book::find($id);
        $order=Order::create([
            'user_id'=>Auth::id(),
            'book_id'=>$id,
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'select_mode'=>$data['select_mode'],
            'price'=>$book->price,
        ]);

        // if($data['select_mode']=='ESEWA'){
        //     return view('frontend.esewa');
        // }else{

            return redirect()->route('thankyou')->with('message','Your order successfully placed');

        // }


    }
    public function thankyou(){
        return view('frontend.thankyou');
    }
}

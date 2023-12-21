<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Order;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Rolandstarke\Thumbnail\Thumbnail;
use App\Http\Controllers\CommonController;
use App\Repositories\BookRepositoryInterface;


class BookController extends Controller
{
    
    public function index(){
        $book= Book::with('category','author')->latest()->get();
        return view('admin.book.index',compact('book'));
    }
    public function create(){
        $category=Category::all();
        $author=Author::all();
        return view('admin.book.create',compact('category','author'));


    }
    public function store(Request $request){

        $rules=[
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg',
            'pdf'=>'required|mimes:pdf',
            'category_id'=>'required',
            'author_id'=>'required',
            'quantity'=>'integer|required|numeric|min:1',
            'status'=>'nullable',
            'price'=>'required',
        ];
        $data=$request->validate($rules);
        if(array_key_exists('status',$data)){

            $data['status'] == "on" ?  $data['status'] = 1 :  $data['status'] = 0;
          }
          else{
              $data['status']=0;
          }
        if(array_key_exists('special',$data)){

           $data['special'] = 1;
          }
          else{
              $data['special']=0;
          }
         
       
        $book= Book::create($data);
        if($file=$data['image']){
           $med= $book->addMedia($file)->toMediaCollection('book_image');
           $mediaItem = $book->getFirstMedia('book_image');
        }   
        if($file=$data['pdf']){
            $book->addMedia($file)->toMediaCollection('book_pdf');
        }
        return redirect()->route('book')->with('message','Book Added Successfully');
    }
    public function edit($id){
        $category=Category::all();
        $author=Author::all();
        $book= Book::find($id);
        return view('admin.book.edit',compact('category','book','author'));
    }

    public function update(Request $request,$id){

        $data=$request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'nullable|mimes:png,jpg',
            'pdf'=>'nullable|mimes:pdf',
            'category_id'=>'required',
            'author_id'=>'required',
            'quantity'=>'integer|required',
            'status'=>'nullable',
            'price'=>'required',
        ]);
        if(array_key_exists('status',$data)){

            $data['status'] = 1 ;
          }
          else{
              $data['status']=0;
          }
        
        $book=Book::find($id);
        
        if($book){
            $book->update($data);
            
        }
        if(array_key_exists('image',$data)){
            $file=$data['image'];
            $book->clearMediaCollection('book_image');
            $book->addMedia($file)->toMediaCollection('book_image');
       
        }
        if(array_key_exists('pdf',$data)){
            $file=$data['pdf'];
            if($book->hasMedia('book_pdf')){

                $book->clearMediaCollection('book_pdf');
            }
            $book->addMedia($file)->toMediaCollection('book_pdf');
       
        }
        return redirect()->route('book')->with('message','Book updated Successfully');

    }
    public function destroy($id){
        $book=Book::find($id);
        if($book){
           $or_book= Order::where('book_id',$id)->get();
           if(count($or_book)>0){
            foreach ($or_book as $key => $value) {
                $value->delete();
            }
           }
            $book->clearMediaCollection('book_image');
            $book->delete();

        }
        return redirect()->route('book')->with('message','Book Deleted Successfully');

    }

    public function getProducts(Request $request)
{
    $perPage = 6; // Number of items per page
    // $data = [...]; // Your array of data

    $paginator = new LengthAwarePaginator(
        array_slice($data, ($request->input('page', 1) - 1) * $perPage, $perPage),
        count($data),
        $perPage,
        Paginator::resolveCurrentPage(),
        ['path' => Paginator::resolveCurrentPath()]
    );

    return response()->json($paginator);
}

}

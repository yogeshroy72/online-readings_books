<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        $category= Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg',
            'status'=>'nullable',
           
        ]);
        if(array_key_exists('status',$data)){
            $data['status']="on" ? $data['status']=1: $data['status']=0;
        }
        else{
            $data['status']=0;
        }
        $category= Category::create($data);
        if($file=$data['image']){
            $category->addMedia($file)->toMediaCollection('category_image');
        }
        return redirect()->route('category')->with('message','Category Created Successfully');
    }

    public function edit($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        // dd($request->all());
        $data=$request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'nullable|mimes:png,jpg',
            'status'=>'nullable',

        ]);
        if(array_key_exists('status',$data)){
            $data['status']="on" ? $data['status']=1: $data['status']=0;
        }
        else{
            $data['status']=0;
        }
        $category=Category::find($id);
        if($category){
            $category->update($data);
            
           
        }
        if(array_key_exists('image',$data)){
            $file=$data['image'];
            $category->clearMediaCollection('category_image');
            $category->addMedia($file)->toMediaCollection('category_image');
       
        }
        return redirect()->route('category')->with('message','Category Updated Successfully');


    }
    public function destroy($id){
        $category=Category::find($id);
        if($category){
            $catBook=Book::where('category_id',$id)->get();
            if(count($catBook)>0){
                return redirect()->route('category')->with('message','Category used on books so cannot deleted!');

            }else{
                $category->clearMediaCollection('category_image');
                $category->delete();

                return redirect()->route('category')->with('message','Category Deleted Successfully');
            }

        }

    }
}

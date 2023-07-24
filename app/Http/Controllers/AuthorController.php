<?php
namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Doctrine\Inflector\Rules\Spanish\Rules;
use App\Repositories\AuthorRepositoryInterface;

class AuthorController extends Controller
{
  
  
    public function index(){
       $author= Author::all();
        return view('admin.author.index',compact('author'));
    }
    public function create(){
        return view('admin.author.create');
    }
    public function store(Request $request){
       
        $rules=[
            'name'=>'required|string',
            'description'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ];
        $data=$request->validate($rules);
        Author::create($data);
       
        return redirect()->route('author')->with('message','Author Added Successfully');
    }
    public function edit($id){
        $author=Author::find($id);
        return view('admin.author.edit',compact('author'));
    }
    public function update(Request $request,$id){
        $rules=[
            'name'=>'required|string',
            'description'=>'required',
            'address'=>'required',
            'phone'=>'required', 
        ];
          $data=$request->all();
          $request->validate($rules);
          $author= Author::find($id);
          if($author){
              $author->update($data);
          }

        return redirect()->route('author')->with('message','Author Updated Successfully');
       
        }
    public function destroy($id){
        $author=Author::find($id);
        if($author){
            $author->delete();
        }
        return redirect()->route('author')->with('message','Author Deleted Successfully');

    }
   
    
   
}

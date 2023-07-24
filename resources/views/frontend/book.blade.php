@extends('layouts.frontend.main')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-evenly mt-4">
        <div class="col-md-8 bg-dark text-white text-center">
            All Books
        </div>
    </div>
    <div class="row ">
        {{-- <div class="card-group"> --}}

        @foreach ($books as $book)
            
        {{-- <div class="col-md-3 mt-5">
            <img src="{{ $book->hasMedia('book_image')? $book->getMedia('book_image')[0]->getFullUrl():'' }}" alt="" width="250" height="250">
            <h5></h5>
            <p>{{$book->category->name}}</p>
            <p>{{$book->author->name}}</p>
            <p>{{$book->price}}</p>
        </div> --}}
            <div class="card col-md-3 mx-2 my-4">
                <a href="{{route('frontend.bookDetails',$book->id)}}">
              <img src="{{ $book->hasMedia('book_image')? $book->getMedia('book_image')[0]->getFullUrl():'' }}" class="img-fluid"  alt="...">
            </a>
              <div class="card-body">
                <h5 class="card-title">{{$book->name}}</h5>
                <p class="card-text">Category : <strong>{{$book->category->name}}</strong></p>
                <p class="card-text"> <label for="">Author By:</label><strong>{{$book->author->name}}</strong></p>
                <p class="card-text">Price :{{$book->price}}</p>
              
            </div>
            </div>
            @endforeach
        {{-- </div> --}}
    </div>
    </div>

@endsection
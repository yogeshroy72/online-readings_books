@extends('layouts.frontend.main')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-evenly mt-4">
        <div class="col-md-8 bg-dark text-white text-center">
             Books Details of {{$book->name}}
        </div>
    </div>
    {{-- <div class="row justify-content-evenly"> --}}
        {{-- <div class="card mb-8"> --}}
            <div class="row justify-content-evenly p-5">
              <div class="col-md-4 ">
                <img src="{{ $book->hasMedia('book_image')? $book->getMedia('book_image')[0]->getFullUrl():'' }}" class="img-fluid rounded-start" width="400px" height="550px">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">Book name : {{$book->name}}</h5>
                  <p class="card-text">Full Description : {{$book->description}}</p>
                  <p class="card-text">Category : <strong>{{$book->category->name}}</strong></p>
                  <p class="card-text"> <label for="">Author By:</label><strong>{{$book->author->name}}</strong></p>
                  <p class="card-text">Price :{{$book->price}}</p>
                  <p class="card-text">Quantity :{{$book->quantity}}</p>
                  <p class="card-text"><small class="text-muted">Book Created at  {{$book->created_at}}</small></p>
                    <a href="{{route('frontend.readMore',$book->id)}}" class="btn btn-primary">Click for Read</a>
                </div>
              </div>
            {{-- </div> --}}
          </div>
    </div>
        </div>
        @endsection
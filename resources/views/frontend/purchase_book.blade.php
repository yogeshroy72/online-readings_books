@extends('layouts.frontend.main')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-evenly mt-4">
        <div class="col-md-8 bg-dark text-white text-center">
            Purchase Book Section
        </div>
    </div>
    <div class="row ">
        {{-- <div class="card-group"> --}}

        @foreach ($purchaseBooks as $key=> $book)
            
        {{-- <div class="col-md-3 mt-5">
            <img src="{{ $book->hasMedia('book_image')? $book->getMedia('book_image')[0]->getFullUrl():'' }}" alt="" width="250" height="250">
            <h5></h5>
            <p>{{$book->category->name}}</p>
            <p>{{$book->author->name}}</p>
            <p>{{$book->price}}</p>
        </div> --}}
            <div class="card col-md-3 mx-2 my-4">
              <img src="{{ $book->book->hasMedia('book_image')? $book->book->getMedia('book_image')[0]->getFullUrl():'' }}" class="img-fluid"  alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$book->name}}</h5>
                <p class="card-text">Category : <strong>{{$book->book->category->name}}</strong></p>
                <p class="card-text"> <label for="">Author By:</label><strong>{{$book->book->author->name}}</strong></p>
                <p class="card-text">Price :{{$book->price}}</p>
                <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewPdfBook{{ $key}}">Read The book</a>

                                    <!-- Modal -->
                    <div class="modal fade" id="viewPdfBook{{ $key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Online Book</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                {{-- <img src="{{ $book->book->hasMedia('book_image')? $book->book->getMedia('book_image')[0]->getFullUrl():'' }}" width="100%" height="100%"  alt="..."> --}}
                                <embed src=" {{ $book->book->hasMedia('book_pdf')? $book->book->getMedia('book_pdf')[0]->getFullUrl():'' }}#toolbar=0" width="100%" height="500" >

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
              
            </div>
            </div>
            @endforeach
        {{-- </div> --}}
    </div>
    </div>

@endsection
@extends('layouts.frontend.main')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-evenly mt-4">
            <div class="col-md-8 bg-dark text-white text-center">
                Search Books
            </div>
        </div>
        <div class="row ">
            @if (count($books) > 0)
                @foreach ($books as $book)
            
                    <div class="card col-md-3 mx-2 my-4">
                        <a href="{{ route('frontend.bookDetails', $book->id) }}">
                            <img src="{{ $book->hasMedia('book_image') ? $book->getMedia('book_image')[0]->getFullUrl() : '' }}"
                                class="" alt="..." height="450px">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <p class="card-text">Category : <strong>{{ $book->category->name }}</strong></p>
                            <p class="card-text"> <label for="">Author
                                    By:</label><strong>{{ $book->author->name }}</strong></p>
                            <p class="card-text">Price :{{ $book->price }}</p>

                        </div>
                    </div>
                @endforeach
            @else
            <div class="row justify-content-evenly mt-4">
                <div class="col-md-8 bg-dark text-white text-center">
                    <h2>Book Not Found!</h2>
                    <h2 class="alert alert-important">See All books <a class="btn btn-primary btn-sm" href="{{ route('frontend.book') }}">Click here</a></h2>
                </div>
            </div>

            @endif
            {{-- </div> --}}
        </div>
    </div>

@endsection

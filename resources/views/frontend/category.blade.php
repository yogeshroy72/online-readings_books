@extends('layouts.frontend.main')
@section('content')


<div class="container-fluid mt-3">
<div class="row justify-content-evenly mt-4">
    <div class="col-md-8 bg-dark text-white text-center">
        All Category
    </div>
</div>
<div class="row ">
    @foreach ($categories as $category)
        
    <div class="col-md-3 mt-5">
        <img src="{{ $category->hasMedia('category_image')? $category->getMedia('category_image')[0]->getFullUrl():'' }}" alt="" width="250" height="250">
        <h5>{{$category->name}}</h5>
        <p>{{$category->description}}</p>
    </div>
    @endforeach
</div>
</div>


@endsection
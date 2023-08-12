@extends('layouts.frontend.main')
<style>
.category_div{
    box-shadow: 1px 1px 5px black;
}

</style>
@section('content')


<div class="container-fluid mt-3">
<div class="row justify-content-evenly mt-4">
    <div class="col-md-8 bg-dark text-white text-center">
        All Category
    </div>
</div>
<div class="row ">
    @foreach ($categories as $category)
        
    <div class="col-md-3 mt-5 category_div">
        <a href="{{ route('frontend.category-book',$category->id)}}">
         <img src="{{ $category->hasMedia('category_image')? $category->getMedia('category_image')[0]->getFullUrl():'' }}" alt="" width="100%" height="75%">
        </a>
        <h5 class="text-white">{{$category->name}}</h5>
        <p style="color:gray;">{{$category->description}}</p>
    </div>
    @endforeach
</div>
</div>


@endsection
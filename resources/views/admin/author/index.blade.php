@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
            <div class="container py-3 col-md-8">
        <h3>Book Author
                <a class="float-end btn btn-primary" href="{{route('author.create')}}">Add Author</a>
        </h3>

            </div>

    </div>
</div>
<div class="row">
    <div class="container">

        <div class="col-md-22">
                <div class="container py-1 ">
                    <table  class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($author as $authortItem)

                            <tr>
                            <td>{{$authortItem->id}}</td>
                            <td>{{$authortItem->name}}</td>
                            <td>{{ $authortItem->address }}</td>
                        
                            <td>{{$authortItem->phone}}</td>
                            <td>{{ $authortItem->description }}</td>
                        

                            <td>

                                <a class="btn btn-primary btn-sm" href="{{route('author.edit',$authortItem->id)}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('author.destroy',$authortItem->id) }}">Delete</a>
                                  
                                </td>
                            </tr>
                            @empty
                            Not Authors Found
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

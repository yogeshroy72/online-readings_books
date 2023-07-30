@extends('layouts.frontend.main')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-evenly mt-4">
        <div class="col-md-8 bg-dark text-white text-center">
             Checkout
        </div>
        
    </div>
    <div class="row justify-content-evenly">
        <div class="checkoutform">
            <form action="{{route('checkout.store',$book->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container col-md-8 ">
                    <div class="col-md-12">
                        <div class="row border justify-content-evenly" >
                            
                    <div class="mb-3 m-4 form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name"  disabled class="form-control text-center" value="{{ auth()->user()->name}}">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                  
                    <div class="mb-3 m-4  col-md-6">
                        <label for="name">Email</label>
                        <input type="text" name="email" disabled class="form-control text-center" value="{{ auth()->user()->email}}">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3 m-4 form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea name="address"  rows="3" class="form-control"></textarea>
                        @error('address') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    
                    <div class="col-md-6 mb-3 m-4 form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control">
                            @error('phone') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3 m-4 form-group">Payment Methods
                        <select class="form-control" name="select_mode" id="">
                            <option value="COD">COD</option>
                            <option value="ESEWA">ESEWA</option>
                        </select>
                            
                    </div>
                

                    <div class="col-md-6 mt-5">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
                          
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
@endsection
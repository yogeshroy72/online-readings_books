@extends('layouts.frontend.main')

@section('content')
<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
<div>
    Welcome {{Auth::user()->name}}

</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @if (auth()->user()->hasRole('Admin'))
                    
                <a href="{{route('Admin.home')}}">Go To DashBoard</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

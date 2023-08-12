<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ONline</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item mx-5">
          <a class="nav-link" href="{{route('frontend.category')}}">Category</a>
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link" href="{{route('frontend.book')}}">Book</a>
        </li>
        <li class="nav-item mr-5 px-5">
          <a class="nav-link" href="#">Special book</a>
        </li>
        @php
    $pur = App\Models\Order::where('user_id', Auth::id())->get();
@endphp

@if (count($pur) > 0)
    <li class="nav-item mr-5 pl-5">
        <a class="nav-link" href="{{ route('purchase.book') }}">Purchased book</a>
    </li>
@endif

        @if (Auth::user())
                       
          {{-- <a class="nav-link" href="{{ url('/home') }}">home</a> --}}
          <li class="nav-item dropdown mx-5">
            {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            {{-- </div> --}}
        </li>
        @else
        <li class="nav-item mx-5 pl-5 float-end">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        {{-- @if (Route::has('register')) --}}

      <li class="nav-item mx-3 float-right">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        {{-- @endif --}}
        {{-- @endauth --}}
        @endif
      </ul>
      <form class="d-flex" method="POST" action="{{route('search.book')}}">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <ul>
      
      </ul>
    </div>
  </div>
</nav>

@php

use App\Http\Controllers\ProductController;


$total = 0;
if (Session::has('user')) {

    $total = ProductController::cartItem();
}

@endphp


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">E Commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/myorders">Order</a>
        </li>




      </ul>
      <form action="/search" class="navbar-form navbar-left" >
        <div class="form-group">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

        </div>
        <button class="btn btn-default" type="submit">Search</button>
      </form>

          <li >
              <a  href="/cartlist">Cart({{ $total ?? '' }})</a>
          </li>
          <ul>
          @if (session()->get('user'))
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Session::get('user')['name'] }}

                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>


                @else

                <li >
                    <a  href="/login">Login</a>

                </li>
                <li >

                    <a  href="/registration">Register</a>
                </li>


                @endif
            </ul>
    </div>
  </nav>

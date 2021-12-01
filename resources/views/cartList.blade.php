{{-- @php

    print_r ( $products['gallery']);
        die();

@endphp --}}
@extends('master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Result For Products</h4>
                <a href="/order_now" class="btn btn-success">Order Now</a> <br><br>
                @foreach ($products as $product)
                    <div class="row searched-item cart-list-divider">
                        <div class="col-sm-3">
                            <a href="detail/{{ $product->id }}">
                                <img src="trending-image" src="{{ $product->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <div class="">
                                <h2>{{ $product->name }}</h2>
                                <h5>{{ $product->decription }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a href="/cart_remove/{{ $product->cart_id }}"  class="btn btn-warning">Remove to cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@extends('master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>My Order</h4>

                @foreach ($orders as $order)
                    <div class="row searched-item cart-list-divider">
                        <div class="col-sm-3">
                            <a href="detail/{{ $order->id }}">
                                <img src="trending-image" src="{{ $order->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2>Name : {{ $order->name }}</h2>
                                <h5>Delivery Status : {{ $order->status }}</h5>
                                <h5>Address :{{ $order->address }}</h5>
                                <h5>Payment Method : {{ $order->method }}</h5>
                                <h5>Payment Status: {{ $order->payment_status }}</h5>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

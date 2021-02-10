@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">

@section('content')

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach($cart as $row)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{ asset($row->options->image) }}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="col-4">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $row->name }}</div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-2"> -->
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Duration</div>
                                        <div class="cart_item_text">{{ $row->options->duration }}</div>
                                    </div>
                                    <!-- </div> -->
                                    <!-- <div class="col-1"> -->
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text text-center">{{ $row->qty }}</div>
                                    </div>
                                    <!-- </div> -->
                                    @php
                                    $price = number_format($row->price);
                                    $total = number_format($row->price*$row->qty);

                                    @endphp
                                    <!-- <div class="col-3"> -->
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">Rp. {{ $price }}</div>
                                    </div>
                                    <!-- </div> -->
                                    <!-- <div class="col-3"> -->
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">Rp. {{ $total }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div><br>
                                        <a href="{{ url('remove/cart/'.$row->rowId) }}"
                                            class="btn btn-block btn-outline-danger btn-sm text-center">Delete</a>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">Rp.{{ number_format(Cart::subtotal()) }}</div>
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <button type="button" class="cart_button_clear btn-outline-danger btn-lg">All Cancel</button>
                        <a href="{{ route('user.checkout') }}" class="cart_button_clear btn-outline-info btn-lg">Buy</a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #33CCFF;">
        <hr style="border-top: 1px solid #33CCFF;">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection

@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">


@section('content')


<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Checkout Here</div>
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

                    <hr style="border-top: 1px solid black;">

                    <!-- /.col -->
                    <div class="row">
                        @if(Session::has('coupon'))
                        <div class="col-12 col-md-12 col-lg-3 order-2 order-md-1"></div>
                        @else
                        <div class="col-12 col-md-12 col-lg-3 order-2 order-md-1">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Apply My Coupon</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{ route('apply.coupon') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control is-valid" id="coupon" name="coupon"
                                                placeholder="Enter Your Coupon">
                                        </div>
                                        <button type="submit"
                                            class="cart_button_clear btn-outline-success btn-sm">Submit Coupon</button>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        @endif
                        <div class="col-12 col-md-12 col-lg-3 order-2 order-md-1"></div>
                        <div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
                            <p class="lead">Amount Due {{ $date }}</p>
                            <div class="table-responsive">
                                <table class="table">
                                    @if(Session::has('coupon'))
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>Rp. {{ number_format(Session::get('coupon')['balance']) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">
                                            <a href="{{ route('coupon.remove') }}"
                                                class="btn btn-outline-danger btn-xs">X</a>
                                            Coupon:
                                        </th>
                                        <td>{{ Session::get('coupon')['name'] }}<br>
                                            <span>Get Coupon Discount:
                                                {{ number_format(Session::get('coupon')['disount']) }} %</span>
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>Rp. {{ number_format(Cart::subtotal()) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Cupon:</th>
                                        <td>0 %</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Total After Discount:</th>
                                        <td>Rp. {{ number_format(Cart::subtotal()) }}</td>
                                    </tr>
                                    @php
                                        $tax = 10;
                                    @endphp
                                    <tr>
                                        <th style="width:50%">Vat</th>
                                        <td>{{ $tax }} %</td>
                                    </tr>
                                    @endif
                                    @if(Session::has('coupon'))
                                    @php
                                        $percent = Session::get('coupon')['balance'] - (Session::get('coupon')['balance'] *
                                        (Session::get('coupon')['disount'] / 100));

                                        $vat = 10;

                                        $vatToPay = ($percent / 100) * $vat;

                                        $final_result = $percent + $vatToPay;
                                    @endphp
                                    <tr>
                                        <th style="width:50%">Total After Discount:</th>
                                        <td>Rp. {{ number_format($percent) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Vat</th>
                                        <td>{{ $vat }} %</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Total:</th>
                                        <td>Rp. {{ number_format($final_result) }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th style="width:50%">Total:</th>
                                        <td>Rp. {{ number_format(Cart::total()) }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #33CCFF;">
        <hr style="border-top: 1px solid #33CCFF;">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                    <h3 class="card-title">Insert Your Data Plase</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('payment.process') }}" method="post">
                            @csrf
                            <div class="card-body">
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Buyer Name / Company Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="buyer_name" name="buyer_name" required
                                  placeholder="Enter Your Name">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="email_buyer" name="email_buyer" required
                                  placeholder="Enter Your Email">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" pattern="^(^\+62\s?|^0)(\d{3,4}-?){2}\d{3,4}$"
                                  name="phone_buyer" required
                                  placeholder="Enter Your Phone Number">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="address_buyer" 
                                  placeholder="Enter Your Address">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="city_buyer" 
                                  placeholder="Enter Your City">
                                </div>
                              </div>
                                    <input type="hidden" name="date_invoice" value="{{ $date }}">
                                    @if(Session::has('coupon'))
                                    <input type="hidden" name="couponid" value="{{ Session::get('coupon')['id'] }}">
                                    <input type="hidden" name="subtotalCoupon" value="{{ Session::get('coupon')['balance'] }}" >
                                    <input type="hidden" name="VatInvoice" value="{{ $vat }}">
                                    @else
                                    <input type="hidden" name="coupon_id" value="null">
                                    <input type="hidden" name="subtotalWithoutCoupon" value="{{ Cart::subtotal() }}">
                                    <input type="hidden" name="totalWithoutCoupon" value="{{ Cart::total() }}">
                                    <input type="hidden" name="TaxInvoice" value="{{ $tax }}">
                                    @endif
                                    @if(Session::has('coupon'))
                                    <input type="hidden" name="TotalDiscount" value="{{ $percent }}">
                                    <input type="hidden" name="FinalTotalDisc" value="{{ $final_result }}">
                                    @else
                                    @endif
                            </div>
                            <!-- /.card-body -->
                            
                            <div class="cart_buttons">
                                <button class="cart_button_clear btn-outline-info btn-lg" type="submit">Go To
                                    Proses Payment</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection

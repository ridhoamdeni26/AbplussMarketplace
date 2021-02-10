@extends('layouts.app')

@section('content')

@php
$cart = Cart::content();
@endphp

<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This payment will last for the next 3 days, 
              please attach a photo and send it to the email listed or the phone number above or directly forward the invoice 
              and proof of payment to our marketing Thank you
            </div>


            <!-- Main content -->
            <div id="ele1">
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="{{ asset('public/media/brand/mwm.png')}}"
                    style="width: 100px; height: auto;" alt="PT Multi Wahana Muda"> 
                    PT Multi Wahana Muda.
                    <img src="{{ asset('public/media/brand/abpluss.png')}}"
                    style="width: 120px; height: auto;" alt="abpluss">
                    <small class="float-right">Date: {{ $date }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>PT MULTI WAHANA MUDA</strong><br>
                    JALAN CIDENG TIMUR NO 11-B<br>
                    PETOJO UTARA, JAKARTA PUSAT 10130<br>
                    Phone: (+62) 819-3008-0555<br>
                    Email: admin@abpluss.co.id
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $name_buyer }}</strong><br>
                    {{ $address }}<br>
                    Phone: {{ $phone }}<br>
                    Email: {{ $email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                @php
                  $NewDate=Date('d-m-Y', strtotime('+3 days'));
                @endphp
                  <b>Invoice: {{ strtoupper($invoice_number) }}</b><br>
                  <br>
                  <b>Payment Due:</b> {{ $NewDate }}<br>
                  <b>Account BNI:</b> 129789883<br>
                  <b>Account BCA:</b> 3103011112
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Duration</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    @foreach($cart as $row)
                    <tbody>
                      <tr>
                        <td>{{ $row->qty }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->options->serial }}</td>
                        <td>{{ $row->options->duration }}</td>
                        @php
                        $total_product = $row->price*$row->qty;
                        @endphp
                        <td>Rp. {{ number_format($total_product) }},-</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{ asset('public/frontend/images/bni-card-center.png')}}" style="width: 70px; height: auto;" alt="BNI">
                  <img src="{{ asset('public/frontend/images/bca.png')}}" style="width: 70px; height: auto;" alt="BCA">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Payment will be made within 3 days, if you do not pay it means the invoice is not valid. 
                  if payment has been made, immediately confirm to the contact provided or contact our marketing team 
                  for information so that it is processed immediately. Thank you
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due {{ $date }}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. {{ number_format($subtotal) }},-</td>
                      </tr>
                      <tr>
                        <th>VAT</th>
                        <td>{{ $vat }}%</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>Rp. {{ number_format($total) }},-</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button id="print" class="btn btn-default print-link no-print"><i class="fas fa-print"></i>Print </button>
                  <a href="{{ route('done.payment') }}" class="btn btn-success float-right" style="margin-right: 5px;">
                    <i class="fas fa-credit-card"></i> Submit Payment
                  </a>
                  <a href="{{ route('pdf.create') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- </div> -->
  <!-- /.content-wrapper -->

  <!-- jdn jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
  
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('public/frontend/js/jQuery.print.js') }}"></script>
  <script>
    jQuery(function($) { 'use strict';
      $("#print").on('click', function() {
          //Print ele2 with default options
          $.print("#ele1");
      });
    });
  </script>

@endsection
@extends('layouts.app')
@section('content')

@php
$order = DB::table('invoices')->where('user_id',Auth::id())->orderBy('id', 'DESC')->limit(10)->get();
@endphp
<div class="contact_form">
    <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('public/panel/assets/images/blank-profile.png') }}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
  
                  <!-- <p class="text-muted text-center">Software Engineer</p> -->
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <a href="{{ route('password.change') }}"><center>Change Password</center></a>
                        
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('success.orderlist') }}"><center>Return Order</center></a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>
                  <a href="{{ route('user.logout') }}" class="btn btn-block btn-outline-info btn-sm">Logout</a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
    </div>
    <div class="col-md-4"></div>
</div>
</div>
@endsection

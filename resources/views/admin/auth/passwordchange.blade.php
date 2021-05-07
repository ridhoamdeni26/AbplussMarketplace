@extends('admin.admin_layouts')

@section('admin_content')

@php
$idPoint = Auth::id();
$SumPoint = DB::table('points_admin')->where('user_id',$idPoint)->sum('point');
$debitPoint = DB::table('claim_voucher')->where('user_id',$idPoint)->sum('debit_point');

$credit_point = $SumPoint - $debitPoint;
@endphp

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br />
    <br />

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
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
                    
                      <b>Your Point</b> <b class="float-right">
                      {{ $credit_point }}
                      </b>
                    </li>
                  </ul>
                  <a href="{{ route('user.logout') }}" class="btn btn-block btn-outline-info btn-sm">Logout</a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              </div>
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <!-- Horizontal Form -->
                        <div class="card-header">
                            <h3 class="card-title">Horizontal Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ Route('admin.password.update') }}" class="form-horizontal"
                            aria-label="{{ __('Reset Password') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Old Password</label>
                                    <div class="col-sm-8">
                                        <input id="oldpass" type="password"
                                            class="form-control {{ $errors->has('oldpass') ? ' is-invalid' : '' }}"
                                            name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus>

                                        @if ($errors->has('oldpass'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('oldpass') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">New Password</label>
                                    <div class="col-sm-8">
                                        <input id="password" type="password"
                                            class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">New Password</label>
                                    <div class="col-sm-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">Reset Password</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

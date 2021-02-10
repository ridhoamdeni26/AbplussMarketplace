@extends('admin.admin_layouts')

@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br />
    <br />

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
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

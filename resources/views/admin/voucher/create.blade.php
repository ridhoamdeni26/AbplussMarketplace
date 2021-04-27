@extends('admin.admin_layouts')

@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"><br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-gray-dark color-palette">
                            <h3 class="card-title">New Voucher</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('store.voucher') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="voucher_name">Voucher Name: <code>*</code></label>
                                            <input type="text" class="form-control @error('voucher_name') is-invalid @enderror" 
                                            id="voucher_name" name="voucher_name" placeholder="Enter Voucher Name">
                                            @if ($errors->has('voucher_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('voucher_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="voucher_point">Voucher Point: <code>*</code></label>
                                            <input type="number" class="form-control @error('voucher_point') is-invalid @enderror" 
                                            id="voucher_point" name="voucher_point" placeholder="Enter Voucher Point">
                                            @if ($errors->has('voucher_point'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('voucher_point') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                        <label>Date:</label>
                                            <div class="input-group date" id="VoucherDate" data-target-input="nearest">
                                                <input type="text" name="voucher_date" class="form-control datetimepicker-input @error('voucher_date') is-invalid @enderror" data-target="#VoucherDate"/>
                                                <div class="input-group-append" data-target="#VoucherDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                @if ($errors->has('voucher_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('voucher_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="voucher_point">Stock Voucher: <code>*</code></label>
                                            <input type="number" class="form-control @error('stock_voucher') is-invalid @enderror" 
                                            id="stock_voucher" name="stock_voucher" placeholder="Enter Stock Voucher">
                                            @if ($errors->has('stock_voucher'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('stock_voucher') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-light color-palette">
                                <button type="submit" class="btn btn-outline-primary store-data">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

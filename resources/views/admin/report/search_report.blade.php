@extends('admin.admin_layouts')

@section('admin_content')

<!-- Horizontal Form -->
<div class="content-wrapper"><br />
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
                <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Search Report</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('search.by.date') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="date_search" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- Month date picker -->
            <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
                <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Search Report</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('search.by.month') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label>Month:</label>
                        <div class="input-group date" id="reservationmonth" data-target-input="nearest">
                            <input type="text" name="month_search" class="form-control datetimepicker-input" data-target="#reservationmonth"/>
                            <div class="input-group-append" data-target="#reservationmonth" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- Year Date Picker -->
            <!-- Month date picker -->
            <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
                <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Search Report</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('search.by.year') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label>Year:</label>
                        <div class="input-group date" id="reservationyear" data-target-input="nearest">
                            <input type="text" name="year_search" class="form-control datetimepicker-input" data-target="#reservationyear"/>
                            <div class="input-group-append" data-target="#reservationyear" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-outline-primary btn-block btn-sm"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
</div>
<!-- /.card -->

@endsection

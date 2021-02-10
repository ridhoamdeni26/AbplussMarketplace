@extends('layouts.app')

@section('content')

<!-- <div class="content-wrapper"> -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-5 offset-lg-1">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Your Order Status</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="progress">
                                        @if($track->status == 0)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        @elseif($track->status == 1)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        @elseif($track->status == 2)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        @elseif($track->status == 3)
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        @else
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        @if($track->status == 0)
                                        <div class="alert alert-warning alert-dismissible">
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Your Order are Under Review!</h5>
                                        </div>
                                        @elseif($track->status == 1)
                                        <div class="alert alert-info alert-dismissible">
                                            <h5><i class="icon fas fa-info"></i> Payment Accept, Order Under Process!</h5>
                                        </div>
                                        @elseif($track->status == 2)
                                        <div class="alert alert-warning alert-dismissible">
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Your Order are On Progress</h5>
                                        </div>
                                        @elseif($track->status == 3)
                                        <div class="alert alert-success alert-dismissible">
                                            <h5><i class="icon fas fa-check"></i> Your Order Done Process!</h5>
                                        </div>
                                        @else
                                        <div class="alert alert-danger alert-dismissible">
                                            <h5><i class="icon fas fa-ban"></i> Your Order Cancel!</h5>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->


                <div class="col-5 offset-lg-1">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Your Order Status</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-striped">
                                    <tr>
                                        <td>Name Buyer:</td>
                                        <td>{{ $track->name_buyer }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $track->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $track->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $track->city_buyer }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sub total</td>
                                        <td>Rp.{{ number_format($track->subtotal) }},-</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>Rp.{{ number_format($track->total) }},-</td>
                                    </tr>
                                    <tr>
                                        <td>Invoice Number</td>
                                        <td>{{ $track->invoice_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tracking Number</td>
                                        <td>{{ $track->status_code }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        <div>
    <section>
<!-- </div> -->
@endsection

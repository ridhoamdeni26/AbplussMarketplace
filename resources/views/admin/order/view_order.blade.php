@extends('admin.admin_layouts')

@section('admin_content')


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>View Order Page</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">View Order Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="callout callout-success">
                                    <h5>Orders Details</h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                      <tr>
                                        <th>Name:</th>
                                        <td>{{ $order->name_buyer }}</td>
                                      </tr>
                                      <tr>
                                        <th>Phone:</th>
                                        <td>{{ $order->phone }}</td>
                                      </tr>
                                      <tr>
                                        <th>Email:</th>
                                        <td>{{ $order->email }}</td>
                                      </tr>
                                      <tr>
                                        <th>Address:</th>
                                        <td>{{ $order->address }}</td>
                                      </tr>
                                      <tr>
                                        <th>City:</th>
                                        <td>{{ $order->city_buyer }}</td>
                                      </tr>
                                      <tr>
                                        <th>Invoice Number:</th>
                                        <td>{{ $order->invoice_number }}</td>
                                      </tr>
                                      <tr>
                                        <th>Total:</th>
                                        <td>Rp. {{ number_format($order->subtotal) }},-</td>
                                      </tr>
                                      <tr>
                                        <th>Total With Vat:</th>
                                        <td>Rp. {{ number_format($order->total) }},-</td>
                                      </tr>
                                      <tr>
                                        <th>Date:</th>
                                        <td>{{ $order->date }}</td>
                                      </tr>
                                      <tr>
                                        <th>Tracking Number:</th>
                                        <td>{{ $order->status_code }}</td>
                                      </tr>
                                      <tr>
                                        <th>Status:</th>
                                        <td>
                                            @if($order->status == 0)
                                            <h5><span class="badge badge-pill badge-warning">Pending</span></h4>
                                            @elseif($order->status == 1)
                                            <h5><span class="badge badge-pill badge-info">Payment Accept</span></h5>
                                            @elseif($order->status == 2)
                                            <h5><span class="badge badge-pill badge-warning">Progress</span></h5>
                                            @elseif($order->status == 3)
                                            <h5><span class="badge badge-pill badge-success">Done Process</span></h5>
                                            @else
                                            <h5><span class="badge badge-pill badge-danger">Cancel</span></h5>
                                            @endif
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <!-- for page product -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">View Order Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="callout callout-success">
                                    <h5>Orders Product</h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Serial</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($details as $key=>$row)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $row->product_code }}</td>
                                            <td>{{ $row->product_name }}</td>
                                            <td><img src="{{ URL::to($row->image_one) }}" height="70;" width="auto;" alt=""></td>
                                            <td>{{ $row->quantity }}</td>
                                            <td>{{ $row->serial }}</td>
                                            <td>{{ number_format($row->totalprice) }}</td>
                                        </tr>
                                        @endforeach
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-box-open"></i>
              Order Proses
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if($order->status == 0)
            <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-outline-success btn-block"><i class="fas fa-credit-card"></i> Payment Accept</a>
            <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-outline-danger btn-block"><i class="fas fa-trash"></i> Cancel Order</a>
            @elseif($order->status == 1)
            <a href="{{ url('admin/progress/process/'.$order->id) }}" class="btn btn-outline-warning btn-block"><i class="fas fa-spinner"></i> Go To Progress</a>
            @elseif($order->status == 2)
            <a href="{{ url('admin/progress/done/'.$order->id) }}" class="btn btn-outline-success btn-block"><i class="fas fa-check"></i> Suceess Proses Items</a>
            @elseif($order->status == 4)
            <div class="col-md-12">
              <div class="callout callout-danger text-center">
                <h5>This Order Get Cancel !!</h5>
              </div>
            </div>
            @else
            <div class="col-md-12">
              <div class="callout callout-success text-center">
                <h5>This Product and Items are Successfully Process Thanks</h5>
              </div>
            </div>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<div>
@endsection

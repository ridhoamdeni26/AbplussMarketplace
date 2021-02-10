@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Amount This Date</span>
                                    <span class="info-box-number">Rp.{{ number_format($total) }},-</span>
                                </div>
                                <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name Buyer</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Subtotal</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Invoice Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=>$row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $row->name_buyer }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ number_format($row->subtotal) }}</td>
                                        <td>{{ number_format($row->total) }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->invoice_number }}</td>
                                        <td>
                                            @if($row->status == 0)
                                            <h5><span class="badge badge-pill badge-warning">Pending</span></h4>
                                            @elseif($row->status == 1)
                                            <h5><span class="badge badge-pill badge-info">Payment Accept</span></h5>
                                            @elseif($row->status == 2)
                                            <h5><span class="badge badge-pill badge-warning">Progress</span></h5>
                                            @elseif($row->status == 3)
                                            <h5><span class="badge badge-pill badge-success">Done Process</span></h5>
                                            @else
                                            <h5><span class="badge badge-pill badge-danger">Cancel</span></h5>
                                            @endif
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="{{ URL::to('admin/view/order/'.$row->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
@endsection

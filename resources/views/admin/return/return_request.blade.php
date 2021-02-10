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
                                        <th>Return</th>
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
                                            @if($row->return_order == 1)
                                            <h5><span class="badge badge-pill badge-warning">Pending</span></h4>
                                            @elseif($row->return_order == 2)
                                            <h5><span class="badge badge-pill badge-success">Return Success</span></h5>
                                            @endif
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="{{ URL::to('admin/approve/return/'.$row->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Apporve
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

@extends('layouts.app')
@section('content')
<div class="contact_form">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Return Your Order</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Name Buyer</th>
                      <th>Email</th>
                      <th>Invoice Number</th>
                      <th>Subtotal</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Return</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order as $row)
                    <tr>
                        <td>{{ $row->name_buyer }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->invoice_number }}</td>
                        <td>{{ number_format($row->subtotal) }}</td>
                        <td>{{ number_format($row->total) }}</td>
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
                        <td>
                            @if($row->return_order == 0)
                            <h5><span class="badge badge-pill badge-warning">No Request</span></h4>
                            @elseif($row->return_order == 1)
                            <h5><span class="badge badge-pill badge-info">Pending</span></h5>
                            @elseif($row->return_order == 2)
                            <h5><span class="badge badge-pill badge-success">Success Return</span></h5>
                            @endif
                        </td>
                        <td class="project-actions text-center">
                            @if($row->return_order == 0)
                                <a class="btn btn-info btn-sm" href="{{ url('request/return/'.$row->id) }}" id="return">
                                    <i class="fas fa-exchange-alt"></i>
                                    Return
                                </a>
                            @elseif($row->return_order == 1)
                            <h5><span class="badge badge-pill badge-info">Pending</span></h5>
                            @elseif($row->return_order == 2)
                            <h5><span class="badge badge-pill badge-success">Success Return</span></h5>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>
@endsection

@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Coupon List</h3>
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-coupon"
                                style="float: right;">
                                <i class="fas fa-plus"></i>
                                Add New
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Percentage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupon as $key=>$row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $row->coupon }}</td>
                                        <td>{{ $row->discount }} %</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="" id="editCoup" data-toggle="modal" 
                                            data-target='#editCoupon' data-modal="{{ $row->id }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" id="delete" 
                                            href="{{ URL::to('admin/delete/coupon/'.$row->id) }}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
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

<!-- add data modal -->
<div class="modal fade" id="add-coupon">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Coupon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{ route('store.coupon') }}">
              @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Coupon Code</label>
                        <input type="text" id="coupon" class="form-control @error('coupon') is-invalid @enderror" aria-describedby="emailHelp"
                            placeholder="Input Your Code Coupon In Here" name="coupon">
                            @if ($errors->has('coupon'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('coupon') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Coupon Discount (%)</label>
                        <input type="text" id="discount" class="form-control @error('discount') is-invalid @enderror" aria-describedby="emailHelp"
                            placeholder="Coupon Discount" name="discount">
                            @if ($errors->has('discount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('discount') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Coupon</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /.edit and update modal -->
<div class="modal fade" id="editCoupon">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Coupon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Coupon Code</label>
                        <input type="hidden" id="id_coupon" name="id_coupon" value="">
                        <input type="text" id="CouponName" class="form-control @error('CouponName') is-invalid @enderror" 
                        aria-describedby="emailHelp"
                            name="CouponName">
                            @if ($errors->has('CouponName'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('CouponName') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Coupon Discount (%)</label>
                        <input type="text" id="CouponDiscount" class="form-control @error('CouponDiscount') is-invalid @enderror" 
                        aria-describedby="emailHelp"
                            name="CouponDiscount">
                            @if ($errors->has('CouponDiscount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('CouponDiscount') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="couponSubmit" class="btn btn-primary">Update Coupon Data</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('edit_coupon')

<script src="{{ asset('public/ajax/CouponEdit.js') }}"></script>

@endpush 

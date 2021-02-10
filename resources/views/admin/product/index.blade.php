@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product List</h3>
                            <a href="{{ route('add.product') }}" class="btn btn-sm btn-primary"
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
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Duration</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->product_code }}</td>
                                        <td>{{ $row->product_name }}</td>
                                        <td>
                                            <img src="{{ URL::to($row->image_one) }}" height="50px" width="50px"
                                                alt="">
                                        </td>
                                        <td>{{ $row->category_name }}</td>
                                        <td>{{ $row->time_duration }}</td>
                                        <td>{{ $row->product_quantity }}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-outline-primary btn-sm" href="{{ URL::to('product/update/'.$row->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm" id="delete"
                                                href="{{ URL::to('delete/product/'.$row->id) }}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                            <a class="btn btn-outline-info btn-sm"
                                                href="{{ URL::to('product/edit/'.$row->id) }}" data-toggle="modal" id="showProduct" data-target="#show-product" data-show-id="{{ $row->id }}">
                                                <i class="fas fa-eye">
                                                </i>
                                                Show
                                            </a>
                                            @if($row->status == 1)
                                                <a class="btn btn-outline-dark btn-sm"
                                                    href="{{ URL::to('inactive/product/'.$row->id) }}">
                                                    <i class="fas fa-thumbs-down">
                                                    </i>
                                                    Inactive
                                                </a>
                                            @else
                                                <a class="btn btn-outline-success btn-sm"
                                                    href="{{ URL::to('active/product/'.$row->id) }}">
                                                    <i class="fas fa-thumbs-up">
                                                    </i>
                                                    Active
                                                </a>
                                            @endif
                                            
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

<!-- /.edit and update modal -->
<div class="modal fade" id="show-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Show Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <div class="row">
                    <input type="hidden" name="id_product" value="">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="showProduct_name" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="showProduct_code" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product_quantity">Product Quantity</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="showProduct_quantity" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                        <label for="Selling Price">Selling Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control uang" name="showSelling_price" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="time_duration">Time Duration</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="showDuration_time" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="category_name">Category</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="showCategory_name" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="subcategory_id">Sub Category</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="showSubcategory_name" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="brand_id">Brand</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="showBrand_name" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                        <label for="Selling Price">Product Size</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="showProduct_size" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                        <label for="Product Color">Selling Color</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="showProduct_color" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                        <label for="Selling Price">Discount Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control uang" name="showDiscount_price" disabled>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Detail</label>
                                <textarea class="form-control" rows="3" id="showProduct_detail" name="showProduct_detail" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                        <label for="Video Link">Video Link</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="showVideo_link" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image One ( Main Thumbnail )</label>
                                <!-- <img src="#" id="showImage_one" class="img-fluid" alt="" name="showImage_one"> -->
                                <div id="showImage_one"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Two</label>
                                <div id="showImage_two"></div>
                            </div>
                        </div>
                        <!-- <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Three</label>
                                <div id="showImage_three"></div>
                            </div>
                        </div> -->
                        <!-- <div class="col-4">
                            <div class="form-group clearfix">
                                <div class="checkbox icheck-turquoise">
                                    <input type="checkbox" id="showMainSlider" disabled/>
                                    <label for="chb1">Main Slider</label>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-6">
                            <div class="form-group clearfix">
                                <div class="checkbox icheck-turquoise">
                                    <input type="checkbox" id="showHot_deal" disabled/>
                                    <label for="Hot Deal">Hot Deal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group clearfix">
                                <div class="checkbox icheck-turquoise">
                                    <input type="checkbox" id="showBestRared" disabled/>
                                    <label for="Best Rated">Best Rated</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-4">
                            <div class="form-group clearfix">
                                <div class="checkbox icheck-turquoise">
                                    <input type="checkbox" id="showMid_slider" disabled/>
                                    <label for="Mid Slider">Mid Slider</label>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-6">
                            <div class="form-group clearfix">
                                <div class="checkbox icheck-turquoise">
                                    <input type="checkbox" id="showTrend" disabled/>
                                    <label for="Trend">Trend Product</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group clearfix">
                                <div class="checkbox icheck-turquoise">
                                    <input type="checkbox" id="showHot_new" disabled/>
                                    <label for="Hot New">Hot New</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('show_product')

<script src="{{ asset('public/ajax/ShowProduct.js') }}"></script>

@endpush 

@extends('admin.admin_layouts')

@section('admin_content')

@php

$category = DB::table('categories')->get();
$brand = DB::table('brands')->get();
$subcategory = DB::table('subcategories')->get();
$timeDuration = DB::table('durations')->get();


@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">PRODUCT SECTION</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('all.product') }}"><button type="button" class="btn btn-outline-info btn-lg" style="float: right;">All Product</button></a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-gray-dark color-palette">
                            <h3 class="card-title">Update Product Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ url('update/product/withoutphoto/'.$product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_name">Product Name: <code>*</code></label>
                                            <input type="text" class="form-control"
                                                name="product_name" value="{{ $product->product_name }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_code">Product Code: <code>*</code></label>
                                            <input type="text" class="form-control" id="product_code"
                                                name="product_code" value="{{ $product->product_code }}" >
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="product_quantity">Quantity: <code>*</code></label>
                                            <input type="text" class="form-control" id="product_quantity"
                                                name="product_quantity" value="{{ $product->product_quantity }}">
                                        </div>
                                    </div>
                                    <!-- <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                        
                                      </div> -->
                                    <div class="col-4">
                                        <label>Selling Price: <code>*</code></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control uang" name="selling_price"
                                                value="{{ $product->selling_price }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Time Duration: <code>*</code></label>
                                            <select class="form-control" name="category_id">
                                                @foreach($timeDuration as $tDur)
                                                <option value="{{ $tDur->id }}" 
                                                    <?php if ($tDur->id == $product->duration_id) {
                                                        echo "selected"; } ?> >{{ $tDur->time_duration }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Category: <code>*</code></label>
                                            <select class="form-control" name="category_id">
                                                @foreach($category as $ct)
                                                <option value="{{ $ct->id }}" 
                                                    <?php if ($ct->id == $product->category_id) {
                                                        echo "selected"; } ?> >{{ $ct->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Sub Category: <code>*</code></label>
                                            <select class="form-control" name="subcategory_id">
                                                @foreach($subcategory as $subcat)
                                                    <option value="{{ $subcat->id }}" 
                                                        <?php if ($subcat->id == $product->subcategory_id) {
                                                        echo "selected"; } ?> >{{ $subcat->subcategory_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Brand: </label>
                                            <select class="form-control" name="brand_id">
                                                @foreach($brand as $br)
                                                    <option value="{{ $br->id }}" 
                                                        <?php if ($br->id == $product->brand_id) {
                                                        echo "selected"; } ?> >{{ $br->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Size</label>
                                            <div class="select2-purple">
                                                <select class="editProductsize" name="editProductsize[]" id="editProductsize"
                                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    @foreach ($productNew as $tag)
                                                    <option value="{{ $tag->product_size }}" selected="selected">
                                                        {{ $tag->product_size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Color</label>
                                            <div class="select2-purple">
                                                <select class="editProductcolor" name="editProductcolor[]" id="editProductcolor"
                                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    @foreach ($productNew as $tag)
                                                    <option value="{{ $tag->product_color }}" selected="selected">
                                                        {{ $tag->product_color }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Discount Price">Discount Price: <code>*</code></label>
                                            <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="discount_price" value="{{ $product->discount_price }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Product Detail <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Place some text here"
                                                name="product_detail"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {{ $product->product_details }}
                                                </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="product_code">Video Link: </label>
                                            <input type="text" class="form-control" id="video_link" name="video_link" 
                                            value="{{ $product->video_link }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <br>
                                <!-- Checkbox Area -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                                <input type="checkbox" id="chb2" name="hot_deal" value="1"
                                                <?php if ($product->hot_deal == 1) {
                                                echo "checked";
                                                } ?>
                                                >
                                                <label for="chb2">Hot Deal
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                                <input type="checkbox" id="chb3" name="best_rated" value="1"
                                                <?php if ($product->best_rated == 1) {
                                                    echo "checked";
                                                    } ?>
                                                >
                                                <label for="chb3">Best Rated
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                                <input type="checkbox" id="cbh4" name="trend" value="1"
                                                <?php if ($product->trend == 1) {
                                                    echo "checked";
                                                    } ?>
                                                >
                                                <label for="cbh4">Trend Product
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                              <input type="checkbox" id="cbh6" name="hot_new" value="1"
                                              <?php if ($product->hot_new == 1) {
                                                echo "checked";
                                                } ?>
                                              >
                                              <label for="cbh6">Hot New
                                              </label> 
                                            </div>
                                          </div>
                                    </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-light color-palette">
                                <button type="submit" class="btn btn-outline-primary store-data">Update Product</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
    <!-- /.content -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update Images</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('update/product/withphoto/'.$product->id) }}" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Image One ( Main Thumbnail ) <code>*</code></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image_one"
                                            name="image_one" onchange="readURL(this);" >
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                        <input type="hidden" name="old_one" value="{{ $product->image_one }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_code">New Image: </label>
                                <img src="#" id="one" alt="" class="img-fluid">
                            </div>
                            <div class="form-group">
                                <label for="product_code">Previous Image: </label>
                                <img src="{{ URL::to($product->image_one) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Image Two</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image_two"
                                            name="image_two" onchange="readURL2(this);">
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                        <input type="hidden" name="old_two" value="{{ $product->image_two }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_code">New Image: </label>
                                <img src="#" id="two" alt="" class="img-fluid">
                            </div>
                            <div class="form-group">
                                <label for="product_code">Previous Image: </label><br>
                                @if($product->image_two == NULL)
                                <img src="{{ URL::to('/') }}/public/media/no-photo/no-photo.png" style="height: 50px; width: 50px;" alt="">
                                @else
                                <img src="{{ URL::to($product->image_two) }}" class="img-fluid" alt="">
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputFile">Image Three</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image_three"
                                            name="image_three" onchange="readURL3(this);">
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                        <input type="hidden" name="old_three" value="{{ $product->image_three }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_code">New Image: </label>
                                <img src="#" id="three" alt="" class="img-fluid">
                            </div>
                            <div class="form-group">
                                <label for="product_code">Previous Image: </label><br>
                                @if($product->image_three == NULL)
                                <img src="{{ URL::to('/') }}/public/media/no-photo/no-photo.png" style="height: 50px; width: 50px;" alt="">
                                @else
                                <img src="{{ URL::to($product->image_three) }}" class="img-fluid" alt="">
                                @endif
                            </div>
                        </div> -->
                    </div>
                    <div class="card-footer bg-light color-palette">
                        <button type="submit" class="btn btn-outline-primary store-data">Update Photo</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection

@section('extra_script')

<script>

$("#editProductsize").select2({
    tags: true,
    multiple: true,
    tokenSeparators: [',', ' ']
});
$("#editProductcolor").select2({
    tags: true,
    multiple: true,
    tokenSeparators: [',', ' ']
});
</script>

@endsection

@extends('admin.admin_layouts')

@section('admin_content')
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
                            <h3 class="card-title">New Product Add Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_name">Product Name: <code>*</code></label>
                                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" 
                                            id="product_name" name="product_name" placeholder="Enter Product Name">
                                            @if ($errors->has('product_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('product_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_code">Product Code: <code>*</code></label>
                                            <input type="text" class="form-control @error('product_code') is-invalid @enderror" 
                                            id="product_code" name="product_code" placeholder="Enter Product Code">
                                            @if ($errors->has('product_code'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('product_code') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="product_quantity">Quantity: <code>*</code></label>
                                            <input type="text" class="form-control @error('product_quantity') is-invalid @enderror" 
                                            id="product_quantity" name="product_quantity" placeholder="Enter Product Quantity">
                                            @if ($errors->has('product_quantity'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('product_quantity') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label>Selling Price: <code>*</code></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control uang @error('selling_price') is-invalid @enderror" 
                                            name="selling_price" placeholder="Selling Price">
                                            @if ($errors->has('selling_price'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('selling_price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Time Duration: <code>*</code></label>
                                            <select class="form-control" name="duration_id">
                                                <option label="--- Choose Duration ---"></option>
                                                @foreach($duration as $dtime)
                                                <option value="{{ $dtime->id }}">{{ $dtime->time_duration }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Category: <code>*</code></label>
                                            <select class="form-control" name="category_id">
                                                <option label="--- Choose Category ---"></option>
                                                @foreach($category as $ct)
                                                <option value="{{ $ct->id }}">{{ $ct->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Sub Category: <code>*</code></label>
                                            <select class="form-control" name="subcategory_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Brand: </label>
                                            <select class="form-control" name="brand_id">
                                                <option label="--- Choose Brand ---"></option>
                                                @foreach($brand as $br)
                                                <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Size <code>*</code></label>
                                            <div class="select2-purple">
                                                <select class="product_size @error('product_size') is-invalid @enderror" multiple="multiple" 
                                                name="product_size[]" id="size" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    <option>Test</option>
                                                </select>
                                                @if ($errors->has('product_size'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('product_size') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Tags <code>*</code></label>
                                            <div class="select2-purple">
                                                <select class="product_color @error('product_color') is-invalid @enderror" multiple="multiple" name="product_color[]" id="color"
                                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    <option>Test</option>
                                                </select>
                                                @if ($errors->has('product_color'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('product_color') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label>Discount Price:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control uang" name="discount_price"
                                                placeholder="Discount Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Product Detail <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea @error('product_detail') is-invalid @enderror" placeholder="Place some text here"
                                                name="product_detail"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            </textarea>
                                            @if ($errors->has('product_detail'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('product_detail') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="product_code">Video Link: </label>
                                            <input type="text" class="form-control" id="video_link" name="video_link"
                                                placeholder="Enter Video Link">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image One ( Main Thumbnail ) <code>*</code></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image_one" require
                                                        name="image_one" onchange="readURL(this);">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="#" id="one" class="img-fluid" alt="">
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
                                                </div>
                                            </div>
                                        </div>
                                        <img src="#" id="two" class="img-fluid" alt="">
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
                                                </div>
                                            </div>
                                        </div>
                                        <img src="#" id="three" class="img-fluid" alt="">
                                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                
                                <br>
                                <hr>
                                <br>
                                <!-- Checkbox Area -->
                                <div class="row">
                                    <!-- <div class="col-4">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                                <input type="checkbox" id="chb1" name="main_slider" value="1"/>
                                                <label for="chb1">Main Slider</label>
                                            </div>
                                          </div>
                                    </div> -->
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                              <input type="checkbox" id="chb2" name="hot_deal" value="1">
                                              <label for="chb2">Hot Deal
                                              </label> 
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                              <input type="checkbox" id="chb3" name="best_rated" value="1">
                                              <label for="chb3">Best Rated
                                              </label> 
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                              <input type="checkbox" id="cbh4" name="trend" value="1">
                                              <label for="cbh4">Trend Product
                                              </label> 
                                            </div>
                                          </div>
                                    </div>
                                    <!-- <div class="col-4">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                              <input type="checkbox" id="cbh5" name="mid_slider" value="1">
                                              <label for="cbh5">Mid Slider
                                              </label> 
                                            </div>
                                          </div>
                                    </div> -->
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                              <input type="checkbox" id="cbh6" name="hot_new" value="1">
                                              <label for="cbh6">Hot New
                                              </label> 
                                            </div>
                                          </div>
                                    </div>
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

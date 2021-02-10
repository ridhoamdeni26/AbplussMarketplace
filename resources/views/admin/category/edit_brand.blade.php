@extends('admin.admin_layouts')

@section('admin_content')

<!-- Horizontal Form -->
<div class="content-wrapper"><br />
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Brand Update</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" class="form-horizontal" action="{{ url('admin/update/brand/'.$brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                                        value="{{ $brand->brand_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputFile" class="col-sm-2 col-form-label">Brand Logo</label>
                                <!-- <div class="input-group"> -->
                                    <div class="col-sm-10">
                                    <!-- <div class="custom-file"> -->
                                        <input type="file" class="form-control custom-file-input" name="brand_logo"
                                        value="{{ $brand->brand_logo }}">
                                        <label class="custom-file-label" >Choose file</label>
                                    <!-- </div> -->
                                </div>
                                <!-- </div> -->
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Old Brand Logo</label>
                                <div class="col-sm-10">
                                    <img src="{{ URL::to($brand->brand_logo) }}" height="120px" width="auto" alt="">
                                    <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right">Update Brand</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- /.card -->

@endsection

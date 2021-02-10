@extends('admin.admin_layouts')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Post Add</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('all.blogpost') }}"><button type="button" class="btn btn-outline-info btn-lg" style="float: right;">All Post Blog</button></a>
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
                            <h3 class="card-title">New Blog Add Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('store.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="post_tittle_en">Post Tittle English: <code>*</code></label>
                                            <input type="text" class="form-control @error('post_tittle_en') is-invalid @enderror" 
                                            id="post_tittle_en" name="post_tittle_en" placeholder="Enter Post Tittle In English" require>
                                                @if ($errors->has('post_tittle_en'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('post_tittle_en') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="post_tittle_id">Post Tittle Indonesia: <code>*</code></label>
                                            <input type="text" class="form-control @error('post_tittle_id') is-invalid @enderror" 
                                            id="post_tittle_id" name="post_tittle_id" placeholder="Enter Post Tittle In Indonesia" require>
                                            @if ($errors->has('post_tittle_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('post_tittle_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Blog Category: <code>*</code></label>
                                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                <option label="--- Choose Category ---"></option>
                                                @foreach($blogCategory as $ct)
                                                <option value="{{ $ct->id }}">{{ $ct->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
                                        <label>Product Detail ( English ) <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea @error('category_id') is-invalid @enderror" placeholder="Place some text here" require
                                                name="details_en"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @if ($errors->has('details_en'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('details_en') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Product Detail ( indonesia ) <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea @error('category_id') is-invalid @enderror" placeholder="Place some text here" require
                                                name="details_id"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                             @if ($errors->has('details_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('details_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Post Image <code>*</code></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="post_image"
                                                        name="post_image" onchange="readURL(this);">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="#" id="one" class="img-fluid" alt="">
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

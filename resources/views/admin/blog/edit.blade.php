@extends('admin.admin_layouts')

@php

$blogCategory = DB::table('post_category')->get();

@endphp

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post Update</h1>
                </div><!-- /.col -->
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
                            <h3 class="card-title">Edit Post Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ url('admin/update/post/'.$post->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="post_tittle_en">Post Tittle English: <code>*</code></label>
                                            <input type="text" class="form-control @error('post_tittle_en') is-invalid @enderror" 
                                            id="post_tittle_en" name="post_tittle_en" value="{{ $post->post_tittle_en }}" require>
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
                                            id="post_tittle_id" name="post_tittle_id" value="{{ $post->post_tittle_id }}" require>
                                            @if ($errors->has('post_tittle_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('post_tittle_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Post Blog Category: <code>*</code></label>
                                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                <option label="--- Choose Category ---"></option>
                                                @foreach($blogCategory as $row)
                                                <option value="{{ $row->id }}"
                                                <?php if ($row->id == $post->category_id) {
                                                    echo "selected";
                                                } ?> >{{ $row->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
                                        <label>Product Detail ( English ) <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea @error('category_id') is-invalid @enderror" placeholder="Place some text here" require
                                                name="details_en"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {!! $post->details_en !!}
                                                </textarea>
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
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {!! $post->details_id !!}
                                                </textarea>
                                             @if ($errors->has('details_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('details_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
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
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_code">New Image: </label>
                                            <img src="#" id="one" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_code">Previous Image: </label>
                                            <div class="clearfix"></div>
                                            @if($post->post_image == NULL)
                                            <img src="{{ URL::to('/') }}/public/media/no-photo/no-photo.png" style="height: 50px; width: 50px;" alt="">
                                            @else
                                            <img src="{{ URL::to($post->post_image) }}" class="img-fluid" alt="">
                                            @endif
                                            <input type="hidden" name="old_post_one" value="{{ $post->post_image }}">
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

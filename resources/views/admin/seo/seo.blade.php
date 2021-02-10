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
                            <h3 class="card-title">Seo Setting Section</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('update.seo') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" id="id_seo" name="id_seo" value="{{ $seo->id }}">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="meta_tittle">Meta Tittle: <code>*</code></label>
                                            <input type="text" class="form-control" 
                                            id="meta_tittle" name="meta_tittle" value="{{ $seo->meta_tittle }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="meta_author">Meta Author: <code>*</code></label>
                                            <input type="text" class="form-control" 
                                            id="meta_author" name="meta_author" value="{{ $seo->meta_author }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="meta_tag">Meta Tag: <code>*</code></label>
                                            <input type="text" class="form-control" 
                                            id="meta_tag" name="meta_tag" value="{{ $seo->meta_tag }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Meta Description: <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="meta_description"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {{ $seo->meta_description }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Google Analytics: <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="google_analytics"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {{ $seo->google_analytics }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Bing Analytics: <code>*</code></label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="bing_analytics"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {{ $seo->bing_analytics }}
                                            </textarea>
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

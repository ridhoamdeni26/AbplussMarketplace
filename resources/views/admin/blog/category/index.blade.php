@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blog Category List Table</h3>
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-category"
                                style="float: right;">
                                <i class="fas fa-plus"></i>
                                Add New Category Blog
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name English</th>
                                        <th>Category Name Indonesia</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogcat as $key=>$row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $row->category_name_en }}</td>
                                        <td>{{ $row->category_name_id }}</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="" id="editBlogCat" data-toggle="modal" 
                                            data-target='#editModalBlog' data-id-blog="{{ $row->id }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" id="delete" href="{{ URL::to('admin/delete/blog/category/'.$row->id) }}">
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
<div class="modal fade" id="add-category">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category Blog List</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{ route('store.blog.category') }}">
              @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name English</label>
                        <input type="text" id="category_name_en" class="form-control @error('category_name_en') is-invalid @enderror" aria-describedby="emailHelp"
                            placeholder="Input Your blog In Here" name="category_name_en">
                            @if ($errors->has('category_name_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_name_en') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name Indonesia</label>
                        <input type="text" id="category_name_id" class="form-control @error('category_name_id') is-invalid @enderror" aria-describedby="emailHelp"
                            placeholder="Input Your blog In Here" name="category_name_id">
                            @if ($errors->has('category_name_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_name_id') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Blog Category</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /.edit and update modal -->
<div class="modal fade" id="editModalBlog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Blog Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                
                    <input type="hidden" id="id_blog" name="id_blog" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name English</label>
                        <input type="text" id="blogNameEn" class="form-control @error('blogNameEn') is-invalid @enderror" aria-describedby="emailHelp"
                            name="blogNameEn">
                            @if ($errors->has('blogNameEn'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('blogNameEn') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name Indonesia</label>
                        <input type="text" id="blogNameId" class="form-control @error('blogNameId') is-invalid @enderror" aria-describedby="emailHelp"
                            name="blogNameId">
                            @if ($errors->has('blogNameId'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('blogNameId') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="editBlogSubmit" class="btn btn-primary">Update Data Blog</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('edit_blog')

<script src="{{ asset('public/ajax/BlogEdit.js') }}"></script>

@endpush 

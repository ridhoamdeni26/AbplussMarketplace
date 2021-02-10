@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sub Category Table</h3>
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-category"
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
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcat as $key=>$row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $row->subcategory_name }}</td>
                                        <td>{{ $row->category_name }}</td>
                                        <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" href="{{ URL::to('admin/edit/subcat/'.$row->id) }}"">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" id="delete" href="{{ URL::to('admin/delete/subcat/'.$row->id) }}">
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
                <h4 class="modal-title">Add Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{ route('store.subcategory') }}">
              @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subcategory_name">Sub Category Name</label>
                        <input type="text" id="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" aria-describedby="emailHelp"
                            placeholder="Input Your Sub Category In Here" name="subcategory_name">
                            @if ($errors->has('subcategory_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subcategory_name') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($category as $row)
                            <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

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
                        <h3 class="card-title">Sub Category Update</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" class="form-horizontal" action="{{ url('admin/update/subcat/'.$subcat->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                        value="{{ $subcat->subcategory_name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($category as $row)
                                        <option value="{{ $row->id }}"
                                            <?php if ($row->id == $subcat->category_id ) {
                                                echo "selected";
                                            } ?> >
                                            {{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right">Update Sub Category</button>
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

@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>
                            <a href="{{ route('add.blogpost') }}" class="btn btn-sm btn-primary"
                                style="float: right;">
                                <i class="fas fa-plus"></i>
                                Add New Post Blog
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Post Tittle</th>
                                        <th>post Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post as $row)
                                    <tr>
                                        <td>{{ $row->post_tittle_en }}</td>
                                        <td>{{ $row->category_name_en }}</td>
                                        <td>
                                            @if($row->post_image == NULL)
                                            <img src="{{ URL::to('/') }}/public/media/no-photo/no-photo.png" style="height: 50px; width: 50px;" alt="">
                                            @else
                                            <img src="{{ URL::to($row->post_image) }}" style="height: 50px; width: 50px;" alt="">
                                            @endif
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="{{ URL::to('admin/edit/post/'.$row->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" id="delete" href="{{ URL::to('admin/delete/post/'.$row->id) }}">
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
@endsection

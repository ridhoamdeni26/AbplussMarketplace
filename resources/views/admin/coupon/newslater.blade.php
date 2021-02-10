@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Subscriber List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form method="post">
                        @csrf
                        {!! method_field('delete') !!}
                        <button formaction="{{ route('deleteall') }}" type="submit" class="btn btn-danger">All Delete</button>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email Subscriber</th>
                                        <th>Subscriber Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sub as $row)
                                    <tr>
                                        <td> <input type="checkbox" name="idsubs[]" value="{{ $row->id }}"> {{ $row->id }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-danger btn-sm" id="delete" 
                                            href="{{ URL::to('delete/newslater/'.$row->id) }}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>
                        </form>
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

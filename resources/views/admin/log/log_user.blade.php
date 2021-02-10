@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name User</th>
                                        <th>Log Date</th>
                                        <th>Log Type</th>
                                        <th>Data Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logs as $key=>$row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $row->user_id }}</td>
                                        <td>{{ $row->log_date }}</td>
                                        <td>
                                            @if($row->log_type == 'login')
                                            <h5><span class="badge badge-pill badge-success">Login</span></h4>
                                            @endif
                                        </td>
                                        <td>{{ $row->data }}</td>
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

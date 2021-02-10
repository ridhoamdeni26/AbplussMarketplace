@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Duration Table</h3>
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
                                        <th>Time Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($duration as $key=>$row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $row->time_duration }}</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="" id="editDur" data-toggle="modal" 
                                            data-target='#editDuration' data-id="{{ $row->id }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" id="delete" href="{{ URL::to('admin/delete/duration/'.$row->id) }}">
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
                <h4 class="modal-title">Add Duration Time</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{ route('store.duration') }}">
              @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Duration Time</label>
                        <input type="text" id="time_duration" class="form-control @error('time_duration') is-invalid @enderror" aria-describedby="emailHelp"
                            placeholder="Input Your Time In Here" name="time_duration">
                            @if ($errors->has('time_duration'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('time_duration') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Duration</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /.edit and update modal -->
<div class="modal fade" id="editDuration">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Time Duration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Time Duration</label>
                        <input type="hidden" id="id_duration" name="id_duration" value="">
                        <input type="text" id="durationTime" class="form-control @error('durationTime') is-invalid @enderror" aria-describedby="emailHelp"
                            name="durationTime">
                            @if ($errors->has('durationTime'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('durationTime') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="SubmitDuration" class="btn btn-primary">Update Data</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('edit_duration')

<script src="{{ asset('public/ajax/DurationEdit.js') }}"></script>

@endpush 


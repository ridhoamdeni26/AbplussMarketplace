@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_single_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_single_responsive.css')}}">


@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <!-- /.card-header -->
                    @foreach($blogs as $row)
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h5>
                                @if(Session()->get('lang') == 'indonesia')
                                    {{ $row->post_tittle_id }}
                                @else
                                    {{ $row->post_tittle_en }}
                                @endif

                                @php
                                $date = $row->created_at;
                                @endphp
                                <span class="mailbox-read-time float-right">{{ $date }}</span>
                            </h5>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <p>
                                @if(Session()->get('lang') == 'indonesia')
                                    {!! $row->details_id !!}
                                @else
                                    {!! $row->details_en !!}
                                @endif
                            </p>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    @endforeach
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- Blog Posts -->
@endsection

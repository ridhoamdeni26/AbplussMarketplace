@extends('admin.admin_layouts')

@php
$voucher = DB::table('voucher_list')->get();
@endphp

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Voucher List</h3>
                        </div>
                        <!-- /.card-header -->
                        <h1 class="h3 text-center text-primary my-3"><b>Voucher Cards</b></h1>
                        <div class="bg-light shadow rounded mx-5 mb-3 p-5">
                            <div class="row">
                                @foreach($voucher as $row)
                                <div class="col-sm-4 px-4 pt-0 pb-5">
                                    <div class="voucher">
                                        <div class="voucher-body bg-orange-gradient">
                                            <div class="voucher-text">
                                                <h5 class="text-white mb-0 font-weight-bold">{{ $row->name_voucher }}</h5>
                                                <p class="text-white mb-0" style="line-height: 1;"><strong
                                                        style="font-size: 1.25rem">{{ $row->voucher_point }}</strong><br>Point</p>
                                            </div>
                                            <div class="voucher-border-left"></div>
                                            <div class="voucher-border-right"></div>
                                        </div>
                                        <div class="voucher-footer">
                                            <div class="voucher-details">
                                                <div class="details-icon">
                                                    <?xml version="1.0" encoding="utf-8"?>
                                                    <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                    <svg version="1.1" id="time_icon" width="24" height="24"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path fill="none" d="M0,0h24v24H0V0z" />
                                                            <path fill="#ffefed"
                                                                d="M12,2.5c-5.2,0-9.5,4.3-9.5,9.5s4.3,9.5,9.5,9.5" />
                                                            <path fill="#ff4933"
                                                                d="M12,2c5.5,0,10,4.5,10,10s-4.5,10-10,10S2,17.5,2,12S6.5,2,12,2z M12,3.5c-4.7,0-8.5,3.8-8.5,8.5 s3.8,8.5,8.5,8.5s8.5-3.8,8.5-8.5S16.7,3.5,12,3.5z" />
                                                            <path fill="#ff4933"
                                                                d="M12.7,5.5c0-0.4-0.3-0.8-0.7-0.8s-0.7,0.3-0.7,0.8v7.2c0,0.4,0.3,0.8,0.7,0.8h5.8c0.4,0,0.7-0.3,0.7-0.8 s-0.3-0.8-0.7-0.8h-5.1V5.5z" />
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="details-text">
                                                    <div class="text-title">Valid till</div>
                                                    <div class="text-description text-primary">
                                                        {{ date('d-m-Y', strtotime($row->date_voucher)) }}</div>
                                                </div>
                                            </div>
                                            <div class="voucher-details">
                                                <div class="details-text">
                                                    <div class="text-title" style="width: 90px;">Claim Voucher</div>
                                                    <div class="text-description text-primary">
                                                        @if($row->stock === 0)
                                                        <button type="button" class="btn btn-outline-dark btn-sm disabled">Claim Now!</button>
                                                        @else
                                                        <button type="button" id="claimVoucher" data-id="{{$row->id}}" onclick="(this)" class="btn btn-outline-dark btn-sm">Claim Now!</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
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

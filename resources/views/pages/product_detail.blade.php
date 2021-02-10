@extends('layouts.app')


<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/new_css.css')}}">

@section('content')
<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{ asset($product->image_one) }}">
                        <img src="{{ asset($product->image_one) }}" alt="">
                    </li>
                    <li data-image="{{ asset($product->image_two) }}">
                        <img src="{{ asset($product->image_two) }}" alt="">
                    </li>
                    <!-- <li data-image="{{ asset($product->image_three) }}">
                        <img src="{{ asset($product->image_three) }}" alt="">
                    </li> -->
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ asset($product->image_one) }}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">All Description Product</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <div class="product_meta">
                                Category: <a href="#">{{ $product->category_name }}</a></span><br>
                                <span class="tagged_as">City: {{ $product->subcategory_name }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <div class="product_name">{{ $product->product_name }}</div>
                        </div>
                        <hr>
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <div class="product_text">
                            
                                <p>{!! Str::limit($product->product_details, 300) !!}</p>
                            </div>
                        </div>
                        <hr>

                        <form method="post" action="{{ url('cart/product/add/'.$product->id) }}">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Duration">Durasi Sewa</label>
                                    <!-- <div class="dropdown-new">
                                        <select name="one" name="duration" id="duration" class="dropdown-select">
                                        <option value="">--- Choose Duration ---</option>
                                        <option value="1">1 Minggu</option>
                                        <option value="2">1 Bulan</option>
                                        <option value="3">3 Bulan</option>
                                        <option value="6">6 Bulan</option>
                                        <option value="12">1 Tahun</option>
                                        </select>
                                    </div> -->
                                    <select class="form-control input-lg" name="duration" id="duration">
                                        <option value="{{ $product->time_duration }}">{{ $product->time_duration }}</option>
                                    </select>
                                    <!-- <div class="dropdown-new" name="duration">
                                        <div class="front" value="{{ $product->time_duration }}"> {{ $product->time_duration }} </div>
                                            <div class="back">
                                            <ul>
                                                <li><option value="{{ $product->time_duration }}">{{ $product->time_duration }}</option></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Duration">Quantity</label>
                                    <input class="form-control" name="qty" type="number" pattern="[0-9]*" value="1">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            

                            <div class="col-lg-12">
                                @if($product->discount_price === NULL)
                                <div class="product_price_new discount"><b>Price:</b> <br>Rp.
                                    {{ $product->selling_price }}</div>
                                <br>
                                @else
                                <div class="product_price_new"><b style="color: black;">Price:</b> <br>Rp.
                                    {{ $product->discount_price }}
                                    <br>
                                    <span class="product_price" style="color: black;">
                                        <strike>Rp. {{ $product->selling_price }}</strike>
                                    </span>
                                </div>
                                @endif
                            </div>

                            <div class="col-lg-12">
                                <div class="product_meta"> <span>Size: {{ $product->product_size }}</span>
                                    <br>
                                    <span>Tags: {{ $product->product_color }}</span>
                                </div>
                            </div>
                        </div>
                            <!-- <div class="col-md-12 col-lg-12 col-xs-12"> -->
                                
                            <!-- </div> -->
                            <br>
                            <hr>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-block btn-outline-info">
                                        <i class="fas fa-cart-plus"></i>
                                        Add to Cart
                                    </button>
                                    <button type="button" class="btn btn-block btn-outline-secondary addwishlist" data-id="{{ $product->id }}">
                                        <i class="fas fa-heart"></i>
                                        Add to Wishlist
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                                <br><br>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>
            
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Recently Viewed -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                    href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                    aria-selected="true">Product Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-three-profile" role="tab"
                                    aria-controls="custom-tabs-three-profile" aria-selected="false">Video Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-three-messages" role="tab"
                                    aria-controls="custom-tabs-three-messages" aria-selected="false">Product Review</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                                aria-labelledby="custom-tabs-three-home-tab">
                                {!! $product->product_details !!}
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-three-profile-tab">
                                {!! $product->video_link !!}
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-three-messages-tab">
                                <div class="fb-comments" data-href="{{ Request::url() }}" 
                                data-width="" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- jdn jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>

<!-- ajax for wishlist -->
<script type="text/javascript">
  $(document).ready(function() {
      $('.addwishlist').click(function() {
          var id = $(this).data('id');
          if (id){
              $.ajax({
                  url: "{{ url('add/wishlist/') }}/" + id,
                  type: "GET",
                  datType: "json",
                  success:function(data){
                      const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                      })

                      if ($.isEmptyObject(data.error)){

                          Toast.fire({
                          icon: 'success',
                          title: data.success
                          })
                      }else{
                          Toast.fire({
                          icon: 'error',
                          title: data.error
                          })
                      }

                  },

              });
          }else{
              alert('danger');
          }
      });
  });

</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('public/frontend/js/product_custom.js')}}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=167835146613666&autoLogAppEvents=1" nonce="9iMkAFCb"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-600d3830ae9d2fb2"></script>

@endsection

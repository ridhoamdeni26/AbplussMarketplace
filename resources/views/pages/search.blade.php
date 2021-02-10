@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_responsive.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/pagination.css')}}"> -->


	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Search Product</div>
							<ul class="sidebar_categories">
                                @php
                                    $categorys = DB::table('categories')->get();
                                @endphp 
                                @foreach($categorys as $cat)
                                <li><a href="{{ url('allcategory/'.$cat->id) }}">{{ $cat->category_name }}</a></li>
                                @endforeach
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>186</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row">
							<div class="product_grid_border"></div>
                            @foreach($product as $pro)
							<!-- Product Item -->
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset($pro->image_one) }}" alt="" style="height: 150px; width: auto;">
                                </div>
								<div class="product_content">
									@if($pro->discount_price === NULL)
                                        <div class="product_price discount">Rp. {{ $pro->selling_price }}</div>
                                    @else
                                        <div class="product_price discount">Rp. {{ $pro->discount_price }}<br><span><strike>Rp. {{ $pro->selling_price }}</strike></span></div>
                                    @endif
									    <div class="product_name"><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}" class="new_product_name" tabindex="0">{{ $pro->product_name }}</a></div>
                                </div>
                                <div class="product_fav addwishlist" data-id="{{ $pro->id }}"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
                                @if($pro->discount_price == NULL)
                                    <li class="product_mark product_new" style="background: #33CCFF;">New</li>
                                @else
                                    <li class="product_mark product_new" style="background: #778899;">
                                        @php
                                        $selling_price = $pro->selling_price;
                                        $discount_price = $pro->discount_price;
                                        $amount_selling = str_replace(".", "", $selling_price);
                                        $amount_discount = str_replace(".", "", $discount_price);


                                        $amount = $amount_selling - $amount_discount;
                                        $discount = $amount/$amount_selling*100;
                                        
                                        @endphp
                                        {{ intval($discount) }}%
                                    </li>
                                @endif
                            </ul>
							</div>
                            @endforeach
						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
                        {{ $product->links() }}
						</div>

					</div>

				</div>
			</div>
		</div>
    </div>

    <!-- jdn jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	  crossorigin="anonymous"></script>
	<script src="{{ asset('public/frontend/js/shop_custom.js')}}"></script>
    
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
@endsection
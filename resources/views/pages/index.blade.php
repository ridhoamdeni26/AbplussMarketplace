@extends('layouts.app')

@section('content')

@include('layouts.menubar')
@include('layouts.slider')

@php

$feature = DB::table('products')->where('status',1)->orderBy('id','desc')->limit(20)->get();
$trend = DB::table('products')->where('status',1)->where('trend',1)->orderBy('id','desc')->limit(8)->get();
$best = DB::table('products')->where('status',1)->where('best_rated',1)->orderBy('id','desc')->limit(6)->get();
$hotDeal = DB::table('products')
			->join('brands','products.brand_id','brands.id')
			->select('products.*','brands.brand_name')
			->where('products.status',1)->where('products.hot_deal',1)->orderBy('id','desc')->limit(10)->get();
$hotNew = DB::table('products')->where('status',1)->where('hot_new',1)->orderBy('id','desc')->get();

@endphp

<div class="characteristics">

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								@foreach($hotDeal as $ht)
								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="{{ $ht->image_one }}" alt=""></div>
									<div class="deals_content">

										@if($ht->discount_price == NULL)
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_category">{{ $ht->product_code }}</div>
											</div>
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_name">
													<a href="{{ url('product/details/'.$ht->id.'/'.$ht->product_name) }}">
														{{ $ht->product_name }}
													</a>
												</div>
												<div class="deals_item_price ml-auto">Rp.{{ $ht->selling_price }},-</div>
											</div>
										@else
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_category">{{ $ht->product_code }}</div>
												<div class="deals_item_price_a ml-auto"><strike>Rp.{{ $ht->selling_price }},-</strike></div>
											</div>
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_name">{{ $ht->product_name }}</div>
												<div class="deals_item_price ml-auto">Rp.{{ $ht->discount_price }},-</div>
											</div>
										@endif

										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Available: <span>{{ $ht->product_quantity }}</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Shop</li>
									<li>Best Rated</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
									@foreach($feature as $row)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<!-- get product detail if image click -->
											<a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
												<div class="product_image d-flex flex-column align-items-center justify-content-center">
													<img src="{{ asset($row->image_one) }}" alt="" style="height: 120px; width: auto;">
												</div>
											</a>
											<div class="product_content">
												<!-- get price for selling price and discount price -->
												@if($row->discount_price === NULL)
												<div class="product_price discount">Rp. {{ $row->selling_price }}</div>
												<br>
												@else
												<div class="product_price discount">Rp. {{ $row->discount_price }}<br><span><strike>Rp. {{ $row->selling_price }}</strike></span></div>
												@endif
												
												<div class="product_name">
													<div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{$row->product_name}}</a></div>
												</div>
												<!-- <div class="product_extras">
													parse to Cart using class addcart
													<button class="product_cart_button addcart" data-id="{{ $row->id }}">Add to Cart</button>
												</div> -->
												<div class="product_extras">
													<!-- parse to Cart using class addcart -->
													<button id="{{ $row->id }}" class="product_cart_button"
														data-toggle="modal" data-target="#CartModel" onclick="productview(this.id)">Add to Cart</button>
												</div>
											</div>
											<!-- parse to wishlist product  -->
											<div class="product_fav addwishlist" data-id="{{ $row->id }}"><i class="fas fa-heart"></i></div>
											<!-- get logo new or persen for discount price -->
											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_discount" style="background: blue;">New</li>
												@else
												<li class="product_mark product_discount">
													@php
													$selling_price = $row->selling_price;
													$discount_price = $row->discount_price;
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
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">
									@foreach($best as $best)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center">
												<img src="{{ asset($best->image_one) }}" alt="" style="height: 120px; width: auto;">
											</div>
											<div class="product_content">
												@if($best->discount_price === NULL)
													<div class="product_price discount">Rp. {{ $best->selling_price }}</div>
													<br>
												@else
													<div class="product_price discount">Rp. {{ $best->discount_price }}<br><span><strike>Rp. {{ $best->selling_price }}</strike></span></div>
												@endif
												<div class="product_name">
													<div><a href="{{ url('product/details/'.$best->id.'/'.$best->product_name) }}">{{ $best->product_name }}</a></div>
												</div>
												<div class="product_extras">
												<button id="{{ $best->id }}" class="product_cart_button"
														data-toggle="modal" data-target="#CartModel" onclick="productview(this.id)">Add to Cart</button>
												</div>
											</div>
											<!-- <div class="best_fav addwishlist" data-id="{{ $row->id }}"><i class="fas fa-heart"></i></div> -->
											<ul class="product_marks">
												@if($best->discount_price == NULL)
												<li class="product_mark product_discount" style="background: blue;">New</li>
												@else
												<li class="product_mark product_discount">
													@php
													$selling_price = $best->selling_price;
													$discount_price = $best->discount_price;
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
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Popular Categories In <script>document.write(new Date().getFullYear())</script></div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">full catalog</a></div>
					</div>
				</div>
				
				@php
				$category = DB::table('categories')->get();
				@endphp
				<!-- Popular Categories Slider -->
					
				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">
							@foreach($category as $cat)
							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<!-- <div class="popular_category_image"><img src="{{ asset('public/frontend/images/popular_1.png') }}" alt=""></div> -->
									<div class="popular_category_text">{{ $cat->category_name }}</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Hot New Category 1 -->
	
	@php
	$cats = DB::table('categories')->skip(1)->first();
	$catid = $cats->id;

	$productCat = DB::table('products')->where('category_id',$catid)->where('status',1)->orderBy('id','desc')->get();

	@endphp

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">{{ $cats->category_name  }} Category</div>
							<ul class="clearfix">
								<li class="active">Hot New Item In 2021</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

							<div class="product_panel panel active">
								<div class="featured_slider slider">
									@foreach($productCat as $row)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center">
												<img src="{{ asset($row->image_one) }}" alt="" style="height: 120px; width: auto;"></div>
											<div class="product_content">
												@if($row->discount_price === NULL)
												<div class="product_price discount">Rp. {{ $row->selling_price }}</div>
												<br>
												@else
												<div class="product_price discount">Rp. {{ $row->discount_price }}<br><span><strike>Rp. {{ $row->selling_price }}</strike></span></div>
												@endif
												
												<div class="product_name">
													<div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{$row->product_name}}</a></div>
												</div>
												<div class="product_extras">
												<button id="{{ $row->id }}" class="product_cart_button"
														data-toggle="modal" data-target="#CartModel" onclick="productview(this.id)">Add to Cart</button>
												</div>
											</div>

											<div class="product_fav addwishlist" data-id="{{ $row->id }}"><i class="fas fa-heart"></i></div>

											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_discount" style="background: blue;">New</li>
												@else
												<li class="product_mark product_discount">
													@php
													$selling_price = $row->selling_price;
													$discount_price = $row->discount_price;
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
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							</div>

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Trends <script>document.write(new Date().getFullYear())</script></h2>
						<div class="trends_text"><p>Products that are trending in this year and are seen by many people</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">
							@foreach($trend as $row)
							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center">
										<img src="{{ $row->image_one }}" alt="">
									</div>
									<div class="trends_content">
										<div class="trends_category"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_code }}</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name">
												<a href="#">{{ $row->product_name }}</a>
											</div>
											<div class="clearfix"></div>
											@if($row->discount_price === NULL)
											<div class="trends_price">Rp. {{ $row->selling_price }}</div>
											<div class="product_price discount"></div>
											<br>
											@else
											<div class="trends_price">Rp. {{ $row->discount_price }}<br><span><strike>Rp. {{ $row->selling_price }}</strike></span></div>
											@endif
										</div>
									</div>
									<ul class="trends_marks">
										@if($row->discount_price == NULL)
										<li class="trends_mark trends_new" style="background: blue;">New</li>
										@else
										<li class="trends_mark trends_new">
											@php
											$selling_price = $row->selling_price;
											$discount_price = $row->discount_price;
											$amount_selling = str_replace(".", "", $selling_price);
											$amount_discount = str_replace(".", "", $discount_price);


											$amount = $amount_selling - $amount_discount;
											$discount = $amount/$amount_selling*100;
											
											@endphp
											{{ intval($discount) }}%
										</li>
										@endif
									</ul>
									<div class="trends_fav addwishlist" data-id="{{ $row->id }}"><i class="fas fa-heart"></i></div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Brands -->

	<!-- <div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container"> -->
						
						<!-- Brands Slider -->

						<!-- <div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>

						</div> -->
						
						<!-- Brands Slider Navigation -->
						<!-- <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{ asset('public/frontend/images/send.png') }}" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<!-- <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div> -->
						</div>
						<div class="newsletter_content clearfix">
							<form action="{{ route('store.newslater') }}" method="post" class="newsletter_form">
							@csrf
								<input type="email" class="newsletter_input" required="required" 
								placeholder="Enter your email address" name="email">
								<button class="newsletter_button" type="submit">Subscribe</button>
							</form>
							<!-- <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- add data modal -->
<div class="modal fade" id="CartModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product Quick View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- <form method="post" action="{{ route('store.category') }}">
              @csrf -->
                <div class="modal-body">
					<div class="row">
						<div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
							<div class="card">
								<div class="card-body">
									<img src="#" id="pimage" class="text-center" alt="">
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
							<div class="card">
								<div class="card-body">
									<h5 class="text-secondary" id="pname"></h5>
								</div>
							</div>
						<!-- /.info-box -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title" >Detail Product</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
								<!-- /.card-header -->
								<input type="hidden" name="productId" id="productId">
								<div class="card-body p-0">
									<ul class="nav nav-pills flex-column">
									<li class="nav-item" id="CatName">
										<!-- <div class="nav-link"><i class="far fa-circle text-info"></i></div> -->
									</li>
									<li class="nav-item" id="SubcatName">
										<div class="nav-link"><i class="far fa-circle text-info"></i></div>
									</li>
									<li class="nav-item" id="BrandName">
										<div class="nav-link"><i class="far fa-circle text-info"></i></div>
									</li>
									<li class="nav-item" id="SellingPrice">
										<div class="nav-link"><i class="far fa-circle text-info"></i></div>
									</li>
									<li class="nav-item" id="SellingPrice">
										<div class="nav-link"><td><span class="badge badge-success">Available</span></td>
										</div>
									</li>
									</ul>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
                </div>
                <div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-info right-block addcart" id="SubmitCart" style="float: right; ">Yes! Add To Cart</button>
                </div>
            <!-- </form> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


	<!-- jdn jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	  crossorigin="anonymous"></script>
	  
	<script type="text/javascript">
		function productview(id){
			$.ajax({
				url: "{{ url('cart/product/view/') }}/" + id,
				type: "get",
				dataType: "json",
				success:function(data){
					$('#productId').val(data.id);
					var id = $('#SubmitCart').val(data.id);
					$('#pname').text(data.product_name);
					$('#pimage').attr( 'src',data.image_one);
					
					$("#CatName").empty().html(
						'<div class="nav-link"><i class="far fa-circle text-info">' + ' ' + 'Product Category:' + ' ' + data.category_name +'</i></div>'
					);
					$("#SubcatName").empty().html(
						'<div class="nav-link"><i class="far fa-circle text-info">' + ' ' + 'City:' + ' ' + data.subcategory_name +'</i></div>'
					);
					$("#BrandName").empty().html(
						'<div class="nav-link"><i class="far fa-circle text-info">' + ' ' + 'Brand:' + ' ' + data.brand_name +'</i></div>'
					);
					$("#SellingPrice").empty().html(
						'<div class="nav-link"><i class="far fa-circle text-info">' + ' ' + 'Price:' + ' ' + 'Rp.' + data.selling_price +'</i></div>'
					);

					// if using select with data array for size and color

					// var d = $('select[name="color]').empty();
					// $.each(data.color,function(key,value){
					// 	$('select[name="color]').append('<option value=" '+ value +' "> '+ value + '</option>');
					// });
				}
			});
		}
	</script>

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

	<!-- ajax for addcart -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.addcart').click(function() {
				var id = $("#SubmitCart").val();
				if (id){
					$.ajax({
						url: "{{ url('add/to/cart') }}/" + id,
						type: "GET",
						datType: "json",
						success:function(data){
							// console.log(data)
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
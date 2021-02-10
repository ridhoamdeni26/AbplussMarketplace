@php
$setting = DB::table('sitesetting')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
<title>Abpluss</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="0XOWQNfbU4mI3SYHt44Nz8akQ_V196CjLbtlkZQuOUE" />
<link href="{{ asset('public/media/brand/abpluss_logo.png') }}" rel="icon" type="image/ico">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}} ">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/responsive.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/adminlte.min.css') }}">


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public/frontend/images/phone.png') }}" alt=""></div>{{ $setting->phone_one }}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public/frontend/images/mail.png') }}" alt=""></div><a href="#">{{ $setting->email }}</a></div>
						<div class="top_bar_content ml-auto">
							<!-- for check if login user or not -->
							@guest

							@else
								<div class="top_bar_menu">
									<ul class="standard_dropdown top_bar_dropdown">
										<li>
											<a href="" data-toggle="modal" data-target="#track-order">My Order Tracking</a>
										</li>
									</ul>
								</div>	
							@endguest
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									@php
										$language = Session()->get('lang');
									@endphp
									<li>
										@if(Session()->get('lang') == 'indonesia' )
										<a href="{{ route('language.english') }}">English<i class="fas fa-chevron-down"></i></a>
										@else
										<a href="{{ route('language.indonesia') }}">Indonesia<i class="fas fa-chevron-down"></i></a>
										@endif
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								@guest
								<div>
									<a href="{{ route('login') }}">
										<div class="user_icon">
											<img src="{{ asset('public/frontend/images/user.svg') }}" alt="">
										</div>
										Register/Login
									</a>
								</div>
								@else
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">
											<div class="user_icon">
												<img src="{{ asset('public/frontend/images/user.svg') }}" alt="">
											</div>Profile
											<i class="fas fa-chevron-down"></i>
										</a>
										<ul>
											<li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
											<li><a href="{{ route('user.checkout') }}">Checkout</a></li>
											<li><a href="{{ route('home') }}">Setting</a></li>
										</ul>
									</li>
								</ul>

								@endguest
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('public/media/brand/abpluss.png') }}" style="height: 60px; width: auto;" alt=""></a></div>
						</div>
					</div>

					@php
						$category = DB::table('categories')->orderBy('category_name','ASC')->get();
					@endphp
			
					<!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form method="post" action="{{ route('product.search') }}" class="header_search_form clearfix">
									@csrf
                                        <input type="search" required="required" class="header_search_input" name="search_product" placeholder="Search for products...">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
													@foreach($category as $row)
													<li><a class="clc" href="#">{{ $row->category_name }}</a></li>
													@endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('public/frontend/images/search.png')}}" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								@guest

								@else

								@php
									$wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
								@endphp

								<div class="wishlist_icon"><img src="{{ asset('public/frontend/images/heart.png') }}" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="{{ route('user.wishlist') }}">Wishlist</a></div>
									<div class="wishlist_count">{{ count($wishlist) }}</div>
								</div>
							</div>

							@endguest
							@php
								$cartSubTotal = number_format(Cart::subtotal());
							@endphp
							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{ asset('public/frontend/images/cart.png') }}" alt="">
										<div class="cart_count"><span>{{ Cart::count() }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a></div>
										<div class="cart_price">Rp.{{ $cartSubTotal }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		
	<!-- Characteristics -->

    @yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('public/media/brand/abpluss.png') }}" style="height: 70px; width: auto;" alt=""></a></div>
							
						</div>
						<div class="footer_title">Got Question? Call Us</div>
						<div class="footer_phone">{{ $setting->phone_one }}</div>
						<div class="footer_contact_text">
							<p>{{ $setting->company_address }}</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{ $setting->youtobe }}"><i class="fab fa-youtube"></i></a></li>
								<li><a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>


				@php
					$category_filter = DB::table('categories')->orderBy('category_name','ASC')->limit(5)->get();
				@endphp
				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Category</div>
						<ul class="footer_list">
						@foreach($category_filter as $cat)
							<li><a href="{{ url('allcategory/'.$cat->id) }}">{{ $cat->category_name }}</a></li>
						@endforeach
						</ul>
					</div>
				</div>

				<!-- <div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div> -->

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> By Muda-Ads
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Track Order modal -->
<div class="modal fade" id="track-order">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your Status Code</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{ route('order.tracking') }}">
              @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status Code</label>
                        <input type="text" id="code" class="form-control" require
                            placeholder="Your Order Status Code" name="code">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-outline-danger btn-block">Track Now</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="{{ asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<!-- <script src="{{ asset('public/frontend/plugins/greensock/ScrollToPlugin.min.jsplugins/greensock/ScrollToPlugin.min.js')}}"></script> -->
<script src="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/easing/easing.js')}}"></script>
<script src="{{ asset('public/frontend/js/custom.js')}}"></script>
<!-- toastr js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- <script src="{{ asset('public/frontend/js/product_custom.js')}}"></script> -->
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

<script>
	@if(Session::has('messege'))
	var type = "{{Session::get('alert-type','info')}}"
	switch (type) {
		case 'info':
			toastr.info("{{ Session::get('messege') }}");
			break;
		case 'success':
			toastr.success("{{ Session::get('messege') }}");
			break;
		case 'warning':
			toastr.warning("{{ Session::get('messege') }}");
			break;
		case 'error':
			toastr.error("{{ Session::get('messege') }}");
			break;
	}
	@endif

</script>
<script>
	$( document ).ready(function() {
		$(".dropdown-new").on("click", function(){
			$(this).toggleClass("flip");
		})

		$(".back ul li").on("click", function(){
			var val = $(this).text();
			$(this).closest('.dropdown-new').find('.front').text(val);
		});
	});
</script>
<script>
        $(document).on("click", "#return", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to Return Again?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Cancel");
                    }
                });
        });

    </script>
</body>

</html>
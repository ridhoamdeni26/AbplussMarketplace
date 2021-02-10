@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">

@section('content')

<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Your Wishlist</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach($product as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="{{ asset($row->image_one) }}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="col-4">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $row->product_name }}</div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-3"> -->
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Product Code</div>
                                                <div class="cart_item_text">{{ $row->product_code }}</div>
                                            </div>
                                        <!-- </div> -->
                                        <!-- <div class="col-2"> -->
                                            @if($row->discount_price == NULL)
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{ $row->selling_price }}</div>
                                            </div>
                                            @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{ $row->discount_price }}</div>
                                            </div>
                                            @endif
                                        <!-- </div> -->
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div><br>
                                                <a href="#" data-cart="{{ $row->id }}" 
                                                class="btn btn-block btn-outline-info btn-sm text-center addcart">Add To Cart</a>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div><br>
                                                <a href="{{ url('remove/wishlist/'.$row->id) }}" 
                                                class="btn btn-block btn-outline-danger btn-sm text-center">Delete</a>
                                            </div>
                                        <!-- </div> -->
									</div>
                                </li>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>
            </div>
            <hr style="border-top: 1px solid #33CCFF;">
            <hr style="border-top: 1px solid #33CCFF;">
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
    <script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>

    <script type="text/javascript">
		$(document).ready(function() {
			$('.addcart').click(function() {
                var id = $(this).attr('data-cart');
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
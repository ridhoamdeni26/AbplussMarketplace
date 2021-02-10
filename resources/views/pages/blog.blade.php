@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_responsive.css')}}">


@section('content')

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                        @foreach($post as $row)
						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url({{ asset($row->post_image)}})"></div>
							<div class="blog_text">
                                @if(Session()->get('lang') == 'indonesia')
                                {{ $row->post_tittle_id }}
                                @else
                                {{ $row->post_tittle_en }}
                                @endif
                            </div>
							<div class="blog_button">
                                <a href="{{ url('blog/details/'.$row->id) }}">
                                @if(Session()->get('lang') == 'indonesia')
                                    Lanjutkan Membaca
                                @else
                                    Continue Reading
                                @endif
                                </a>
                            </div>
                        </div>
                        @endforeach
					</div>
				</div>
					
			</div>
		</div>
    </div>

@endsection
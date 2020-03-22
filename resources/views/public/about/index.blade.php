@extends('public.layouts.master')

@section('title')
<title>about me</title>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-8 col-md-7 col-12">
			{{$about->about}}
		</div>


		<div class="col-lg-4 col-md-5 col-12">

			<div class="profile card rounded-0 my-2">
				<div class="image">
					<img src="assets/img/profile-pic.jpg" alt="" class="transition-4 img-fluid">
				</div>
				<div class="info text-center">
					<h2 class="font-25">NASIR KHAN</h2>
					<h3 class="font-20">FULL STACK WEB DEVELOPER</h3>
				</div>

				<div class="social-link">
					<ul>
						<li><a class="font-16 transition-4" href="poem.html"><i class="fa fa-facebook"></i></a></li>
						<li><a class="font-16 transition-4" href="poem.html"><i class="fa fa-instagram"></i></a></li>
						<li><a class="font-16 transition-4" href="poem.html"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="related-poem card p-2 rounded-0 mt-3">
				<h3 class="font-20 pb-3 text-center">Related Posts</h3>
				@foreach($related_posts as $post)
				<div class="single-related-poem border-top py-2">
					<h4 class="font-17 mb-1"><a class="color-1st" href="{{route('web-single-post',['slug' => $post->slug])}}">{{$post->title}}</a></h4>
					<h5 class="font-14">{{$post->writer}}</h5>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
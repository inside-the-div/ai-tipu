@extends('public.layouts.master')

@section('title')
<title>ai-tipu | home</title>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-8 col-md-7 col-12">
			<div class="all-post">
				@foreach($posts as $post)
					<div class="single-poem py-3 border-bottom">
						<h2 class="font-23 poem-title"><a class="transition-4" href="{{route('web-single-post',['slug' => $post->slug])}}">{{$post->title}}</a></h2>
						<p class="font-14 py-2 poem-short-summery">{{$post->description}}</p>
						<p class="d-block font-16 poem-date font-pt">Date: {{$post->created_at->format('d/m/Y')}}</p>
						<div class="tag-list">
							@foreach($post->category as $category)
								<a class="bg-1st font-14 transition-4" href="{{route('web-category',['slug' => $category->slug])}}">{{$category->name}}</a>
							@endforeach
						</div>
					</div>
				@endforeach
			
			</div>
		</div>


		<div class="col-lg-4 col-md-5 col-12">
			<div class="search-form card p-2 rounded-0">
				<p class="font-16 pb-2 ">Search Poem</p>
				<form action="{{route('web-search')}}" method="post">
					@csrf
					<input type="text" class="form-control rounded-0" placeholder="Type Poem Name" name="keyword">
					<input id="search-btn" type="submit" class="transition-4 form-control rounded-0 bg-1st border-0 my-2  font-16 " value="Search">
				</form>
			</div>

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

			<div class="category card p-2 rounded-0">
				<h4 class="category">Category</h4>
				<div class="row">
					@foreach($categorys as $c)
					<div class="col-1">
						<span><i class="fa fa-arrow-right"></i></span>
					</div>
					<div class="col-11">
						<a class=" transition-4" href="{{route('web-category',['slug' => $c->slug])}}">{{$c->name}} ({{count($c->posts)}})</a>
					</div>
					@endforeach
				</div>
			</div>

			<!-- end category -->
		</div>
	</div>
@endsection
@extends('public.layouts.master')

@section('title')
<title>Contact Me</title>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-8 col-md-7 col-12">
			<div class="card p-3">
				<h1 class="font-23 text-center mb-5">Contact We Me</h1>
				<div id="success-message">
					@if ($errors->any())
					  @foreach ($errors->all() as $error)
					      <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
					        {{$error}}
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					  @endforeach
					@endif
					@if(session()->has('success'))
					    <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
					      {{ session()->get('success') }}
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					      </button>
					    </div>
					@endif
				</div>
				<form action="{{route('web-send-email')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-lg-6 col-12">
							<label for="" class="font-16"><b>Name*</b></label>
							<input type="text" class="form-control rounded-0" name="name">
						</div>
						<div class="col-lg-6 col-12">
							<label for="" class="font-16"><b>Subject*</b></label>
							<input type="text" class="form-control rounded-0" name="subject">
						</div>

					</div>
					<label for="" class="font-16 mt-3"><b>Email*</b></label>
					<input type="text" class="form-control rounded-0" name="email">

					<label for="" class="font-16 mt-3"><b>Message*</b></label>
					<textarea name="message" cols="30" rows="5" class="form-control rounded-0"></textarea>

					<input type="submit" name="submit" class="form-control bg-1st mt-2 rounded-0 bg-1 text-light border-0" style="background: #eb4d4b" id="send-btn">
				</form>
			</div>
		</div>


		<div class="col-lg-4 col-md-5 col-12">

			<div class="profile card rounded-0">
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


@section('custom-js')
	<script>

		$(document).ready(function(){
			var m = '<p class="text-info font-18 font-josefin text-center mb-2">Please wait email sending ...</p>';
			$('#send-btn').click(function(){
				 $("#success-message").html(m);
			})
			
		})
	</script>
@endsection
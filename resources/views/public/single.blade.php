@extends('public.layouts.master')

@section('title')
<title>{{$post->title}}</title>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-8 col-md-7 col-12">			
			<div class="poem text-center">
				<div class="poem-heaer">
					<h1 class="font-25">{{$post->title}}</h1>
					<h2 class="font-20">{{$post->writer}}</h2>
				</div>
				<div class="poem-content  py-4">
					{!! $post->body !!}
				</div>
			</div>
			<div class="poem-info">
				<p class="d-block font-16 poem-date mb-3"><span>Date: {{$post->created_at->format('d/m/Y')}}</span><span class="d-inline-block ml-3 font-pt">Total Comment: {{count($comments)}}</span></p>
				<div class="tag-list">

					@foreach($post->category as $category)
						<a class="bg-1st font-14 transition-4" href="{{route('web-category',['slug' => $category->slug])}}">{{$category->name}}</a>
					@endforeach
			</div>

			<div class="poem-desctiption mt-5 ">
				<h3 class="font-20 border-bottom pb-3">মূল ভাব</h3>
				<p class="font-14 text-justify py-3">{{$post->description}}</p>
			</div>


			
			@if($post->image != '')
			<div class="image">
				<div class="p-3">
					<!-- <img src="" alt="{{$post->title}}">	 -->
					<img src="{{Storage::url($post->image)}}" alt="">	
				</div>
			</div>
			@endif

			@if($post->video != 'none')
			<div class="video">
				<div class="card p-3">
					<iframe  height="315"
					src="https://www.youtube.com/embed/tgbNymZ7vqY">
					</iframe>	
				</div>
			</div>
			@endif


			<div class="all-comments mt-5">
				@if(count($comments) > 0)
				<h3 class="font-20 pb-3  mb-2">All Comments ({{count($comments)}})</h3>
				@endif

				@foreach($comments as $comment)
					<div class="single-comment py-2 border-top">
						<h3 class="font-18">{{$comment->name}}</h3>
						<p class="font-14">Date: {{$comment->created_at}}</p>
						<p class="text-justify font-16 mt-2">{{$comment->text}}</p>
					</div>
				@endforeach
			</div>



			<div class="comment mt-5">
				<h3 class="font-20 pb-2 font-pt">Put a comment</h3>
				<span class="font-18  mb-2 d-block" id="comment-message"></span>
				<div class="row">
					<input type="hidden" id="comment-post_id" value="{{$post->id}}">
					<div class="col-12 col-lg-6">
						<input type="text" class="form-control rounded-0" placeholder="Name" id="comment-name">
					</div>
					<div class="col-12 col-lg-6">
						<input type="email" class="form-control rounded-0" placeholder="Email" id="comment-email">
					</div>
				</div>
				<textarea name="" id="comment-text" cols="30" rows="5" class="form-control rounded-0 mt-2" placeholder="comment"></textarea>
				
				<button class="px-4 pb-1 font-19 bg-1st border-0 mt-2 text-white" id="comment-btn">Submit</button>
				<span class="font-josefin"><b>Note: </b>Comment will show after admin approval</span>
			</div>
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
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$("#comment-btn").click(function(){
				var name = $("#comment-name").val(); 
				var email = $("#comment-email").val(); 
				var text = $("#comment-text").val(); 
				var post_id = $("#comment-post_id").val(); 
				var message = $("#comment-message");

				if(name != '' && email != '' && text != '' && post_id != ''){
					$.ajax({

					   type:'POST',
					   url:'/comment',
					   data:{name:name, email:email, text:text,post_id:post_id},
					   success:function(data){
					      message.html('<p class="text-success">'+data.success+'</p>')
					      var name = $("#comment-name").val(''); 
					      var email = $("#comment-email").val(''); 
					      var text = $("#comment-text").val(''); 
					   }
					});
				}else{
					message.html('<p class="text-danger">Please fill all the fields</p>')
				}

				setTimeout(function(){ 
					message.html('');
				 }, 3000);

			})



		})
	</script>
@endsection
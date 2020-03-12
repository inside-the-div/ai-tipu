@extends('admin.layouts.master')
@section('title')
<title>{{$post->title}}</title>
@endsection
@section('page-top')
<a href="{{route('posts')}}" class="font-josefin">All posts</a>
<a href="{{route('post-edit',['id'=>$post->id])}}" class="font-josefin">Edit</a>

@endsection


@section('content')
	
	<div class="row mt-3">
		<div class="col-12 col-lg-6 ">
			<div class="card p-3">
				<h1 class="font-25 font-josefin text-center">{{$post->title}}</h1>
				<p class="font-18 text-center mb-3">{{$post->writer}}</p>
				<p class="font-18 mt-2">{!! $post->body !!}</p>
				<p class="font-16 mt-2 font-pt"><b>Tag:</b> {{$post->tag}}</p>
				<p class="font-16 mt-2 font-pt"><b>Description:</b> {{$post->description}}</p>
				<p class="font-14 mt-2 text-right font-pt"><b>Date:</b> {{$post->created_at->format('d/m/Y')}}</p>
			</div>
			<div class="card mt-2 p-3">

				@if($post->video != 'none')
				<iframe width="100%" height="350"
				src="https://www.youtube.com/embed/{{$post->video}}">
				
				</iframe>
				@else
					<h3 class="font-18 font-josefin">Video not found!!</h3>
				@endif

			</div>
		</div>
		<div class="col-12 col-lg-6">
			<h1 class="font-25 font-pt mb-3">Comments of this post <div class="badge badge-pill badge-dark font-pt">{{count($comments)}}</div></h1>
			<div class="row">

				@foreach($comments as $comment)
					
					<div class="col-12 mb-3">
						<div class="card p-3">
							<h3 class="font-20"><a href="">{{$comment->name}}</a></h3>
							<span class="mt-2"><b>Date: </b>{{$comment->created_at->format('d/m/Y')}}</span>
						</div>
					</div>
				@endforeach



			</div>
		</div>
	</div>

@endsection

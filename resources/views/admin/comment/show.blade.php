@extends('admin.layouts.master')
@section('title')
<title>{{$comment->name}}</title>
@endsection
@section('page-top')
<a href="{{route('comments')}}" class="font-pt pb-1">All Comments</a>
@if($comment->active == 0)
<form action="{{route('comment-active')}}" method="POST" class="d-inline ml-2">
	@csrf
	<input type="hidden" name="id" value="{{$comment->id}}">
	<input type="submit" value="Approve " class="btn_1 font-pt font-16">
</form>
@endif

@if($comment->active == 1)
<form action="{{route('comment-not-active')}}" method="POST" class="d-inline ml-2">
	@csrf
	<input type="hidden" name="id" value="{{$comment->id}}">
	<input type="submit" value="Disapprove" class="btn_2 font-pt font-16">
</form>
@endif

@endsection


@section('content')
	
	<div class="row mt-3">
		<div class="col-12 col-lg-5 ">
			<div class="card p-3">
				<h1 class="font-20 font-josefin"><b>Name: </b>{{$comment->name}}</h1>
				<p class="font-16 font-josefin"><b>Email: </b>{{$comment->email}}</p>
				<p class="font-16 mt-2"><b>Text:</b> {{$comment->text}}</p>
				<div class="text-right">
					<span class="mt-2"><b>Date: </b>{{$comment->created_at->format('d/m/Y')}}</span>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-7">
			
			<div class="row">
				<div class="col-12 mb-3">
					<div class="card p-3">
						<h1 class="font-25 font-josefin mb-3">Post of this comment<div class="badge badge-pill badge-dark font-pt"></div></h1>
						<h3 class="font-20"><a href="{{route('post-show',['id' => $comment->post->id])}}">{{$comment->post->title}}</a></h3>
						<span class="mt-2"><b>Date: </b>{{$comment->post->created_at->format('d/m/Y')}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

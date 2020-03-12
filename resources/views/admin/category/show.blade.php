@extends('admin.layouts.master')
@section('title')
<title>{{$category->name}}</title>
@endsection
@section('page-top')
<a href="{{route('categories')}}" class="font-josefin">All categories</a>
<a href="{{route('category-edit',['id'=>$category->id])}}" class="font-josefin">Edit</a>

@endsection


@section('content')
	
	<div class="row mt-3">
		<div class="col-12 col-lg-5 ">
			<div class="card p-3">
				<h1 class="font-25 font-josefin">{{$category->name}}</h1>
				<p class="font-18 mt-2"><b>Tag:</b> {{$category->tag}}</p>
				<p class="font-18 mt-2"><b>Description:</b> {{$category->description}}</p>
			</div>
		</div>
		<div class="col-12 col-lg-7">
			<h1 class="font-25 font-josefin mb-3">Post of this category <div class="badge badge-pill badge-dark font-pt">{{count($posts)}}</div></h1>
			<div class="row">

				@foreach($posts as $post)
					
					<div class="col-12 mb-3">
						<div class="card p-3">
							<h3 class="font-20"><a href="">{{$post->title}}</a></h3>
							<span class="mt-2"><b>Date: </b>{{$post->created_at->format('d/m/Y')}}</span>
						</div>
					</div>
				@endforeach



			</div>
		</div>
	</div>

@endsection

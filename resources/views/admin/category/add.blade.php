@extends('admin.layouts.master')
@section('title')
<title>Add category</title>
@endsection
@section('page-top')
<a href="{{route('categories')}}" class="font-josefin">All categories</a>
<h1 class="font-josefin font-25">Add new category</h1>
@endsection


@section('content')
	<div class="row mt-5">
		<div class="col-lg-6 col-12 offset-lg-3">

			<div class="card p-3">
				<form action="{{route('category-store')}}" method="POST">
					@csrf;
					<label for="" class="font-18 font-josefin"><b>*Name</b></label>
					<input type="text" name="name" class="form-control rounded-0 font-20">

					<label for="" class="font-18 font-josefin mt-3"><b>*Tag(For SEO)</b></label>
					<textarea name="tag" cols="30" rows="3" class="form-control rounded-0 font-16"></textarea>

					<label for="" class="font-18 font-josefin mt-3"><b>*Description(For SEO)</b></label>
					<textarea name="description" cols="30" rows="3" class="form-control rounded-0 font-16"></textarea>

					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">

					<input type="submit" name="submit" value="Add" class="form-control btn btn-info mt-3 font-20 py-2">
				</form>
			</div>
		</div>
	</div>
@endsection

@extends('admin.layouts.master')
@section('title')
<title>{{$my->name}}</title>
@endsection
@section('page-top')
<a href="{{route('profile-edit')}}" class="font-josefin">Edit</a>
<h1 class="font-josefin font-25">My profile</h1>
@endsection


@section('content')

<div class="row mt-20">
	<div class="col-lg-10 col-12 offset-lg-1">
		<div class="card p-3">
			<div class="row">
				<div class="col-lg-4 col-12">
					<h3 class="font-josefin font-20 mb-2">Image.............</h3>
					<h3 class="font-josefin font-20 mb-2">About</h3>
					<p>{{$my->about}}</p>
				</div>
				<div class="col-12 col-lg-8">
					<h1 class="font-josefin font-25"><b>Name:</b> {{$my->name}}</h1>
					<p class="font-josefin font-20 mt-2"><b>Email:</b> {{$my->email}}</p>
					<p class="font-josefin font-20 mt-2"><b>Phone:</b> {{$my->phone}}</p>
					<p class="font-josefin font-20 mt-2"><b>Address:</b> {{$my->address}}</p>
					<p class="font-josefin font-18 mt-2 d-inline"><b>Permissions: </b></p>
					<ul  class=" m-0 d-inline">
						@foreach($my->permissions as  $p)
						<li class="font-josefin font-20 d-inline">{{$p->page}}, </li>
						@endforeach
						@if($my->id == 1)
						<li class="font-josefin font-20 d-inline">user</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

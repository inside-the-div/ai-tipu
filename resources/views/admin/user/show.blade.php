@extends('admin.layouts.master')
@section('title')
<title>{{$user->name}}</title>
@endsection
@section('page-top')
<a href="{{route('users')}}" class="font-josefin">All User</a>
<h1 class="font-josefin font-25">user details</h1>
@endsection


@section('content')

<div class="row mt-20">
	<div class="col-lg-10 col-12 offset-lg-1">
		<div class="card p-3">
			<div class="row">
				<div class="col-lg-4 col-12">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci qui itaque temporibus. Iure labore esse officiis reprehenderit voluptas minus expedita, numquam sint exercitationem nam, inventore repellendus, error saepe nulla aspernatur. Saepe eos neque temporibus placeat rerum dignissimos, maxime nesciunt pariatur repudiandae amet sed aliquam ut, delectus sequi nisi cumque consequatur praesentium rem harum. Unde inventore ad nobis, eius quam rem voluptatibus? Perspiciatis doloremque officiis obcaecati voluptatem dolore laudantium quo modi sequi error, cupiditate, alias, eum consequuntur dicta! Veritatis officiis accusantium eius, laudantium provident exercitationem. Cum tempora veniam maxime, atque saepe quas vel id, consequuntur eum neque dolorum odio, unde quos!</p>
				</div>
				<div class="col-12 col-lg-8">
					<h1 class="font-josefin font-25"><b>Name:</b> {{$user->name}}</h1>
					<p class="font-josefin font-20 mt-2"><b>Email:</b> {{$user->email}}</p>
					<p class="font-josefin font-20 mt-2"><b>Phone:</b> {{$user->phone}}</p>
					<p class="font-josefin font-20 mt-2"><b>Address:</b> {{$user->address}}</p>
					<p class="font-josefin font-18 mt-2"><b>About:</b> {{$user->about}}</p>
					<p class="font-josefin font-18 mt-2"><b>Permission: </b></p>
					<ul  class="ml-20">
						@foreach($user->permissions as $p)
						<li class="font-josefin font-20">{{$p->page}}</li>
						@endforeach
						@if($user->id == 1)
						<li class="font-josefin font-20">user</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-5 col-12 offset-lg-1 mt-2">
		<div class="card p-3">
			<h1 class="font-25 font-josefin mb-2 text-center">{{$user->name}}'s posts : {{$total_post}}</h1>
			<ul class="ml-20">
				@foreach($posts as $post)
				<li class="font-josefin font-16 mt-2"><a href="{{route('post-show',['id' => $post->id])}}">{{$post->title}}</a></li>
				 <span class="font-pt font-14 "><b >Date:</b> {{$post->created_at->format('d/m/Y')}}</span>
				@endforeach
				
			</ul>

			<div class="mt-5">
				{{ $posts->links() }}
			</div>
		</div>
	</div>

	<div class="col-lg-5 col-12  mt-2">
		<div class="card p-3">
			<h1 class="font-25 font-josefin mb-2 text-center">{{$user->name}}'s categories : {{$total_categories}}</h1>
			<ul class="ml-20">
				@foreach($categories as $category)
				<li class="font-josefin font-16 mb-1" ><a href="{{route('category-show',['id' => $category->id])}}">{{$category->name}}</a></li>
				@endforeach
				
			</ul>

			<div class="mt-5">
				{{ $categories->links() }}
			</div>
		</div>
	</div>

</div>
@endsection

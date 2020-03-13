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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci qui itaque temporibus. Iure labore esse officiis reprehenderit voluptas minus expedita, numquam sint exercitationem nam, inventore repellendus, error saepe nulla aspernatur. Saepe eos neque temporibus placeat rerum dignissimos, maxime nesciunt pariatur repudiandae amet sed aliquam ut, delectus sequi nisi cumque consequatur praesentium rem harum. Unde inventore ad nobis, eius quam rem voluptatibus? Perspiciatis doloremque officiis obcaecati voluptatem dolore laudantium quo modi sequi error, cupiditate, alias, eum consequuntur dicta! Veritatis officiis accusantium eius, laudantium provident exercitationem. Cum tempora veniam maxime, atque saepe quas vel id, consequuntur eum neque dolorum odio, unde quos!</p>
				</div>
				<div class="col-12 col-lg-8">
					<h1 class="font-josefin font-25"><b>Name:</b> {{$my->name}}</h1>
					<p class="font-josefin font-20 mt-2"><b>Email:</b> {{$my->email}}</p>
					<p class="font-josefin font-20 mt-2"><b>Phone:</b> {{$my->phone}}</p>
					<p class="font-josefin font-20 mt-2"><b>Address:</b> {{$my->address}}</p>
					<p class="font-josefin font-18 mt-2"><b>About:</b> {{$my->about}}</p>
					<p class="font-josefin font-18 mt-2"><b>Permission: </b></p>
					<ul  class="ml-20">
						@foreach($my->permissions as $p)
						<li class="font-josefin font-20">{{$p->page}}</li>
						@endforeach
						@if($my->id == 1)
						<li class="font-josefin font-20">user</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

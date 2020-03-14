@extends('admin.layouts.master')
@section('title')
<title>{{$user->name}}</title>
@endsection
@section('page-top')
<a href="{{route('users')}}" class="font-josefin">All users</a>
<h1 class="font-josefin font-25">Add new user</h1>
@endsection


@section('content')

	<form action="{{route('user-update')}}" method="post" id="user_add_form">
		@csrf
	<!-- website info area start  -->
		<div class="row mt-20">
			
			<input type="hidden" value="{{$user->id}}" name="id">
			<div class="col-lg-6 col-12">
				<div class="card p-3">
					<label for="name" class="font-josefin font-18"><b>Name*</b></label>
					<input type="text" name="name" class="form-control rounded-0 font-18" value="{{$user->name}}">

					<label for="email" class="font-josefin font-18 mt-4"><b>Email*</b></label>
					<input type="Email" name="email" class="form-control rounded-0 font-18" value="{{$user->email}}">

					<label for="password" class="font-josefin font-18 mt-4"><b>Password*</b></label>
					<input type="password" name="password" class="form-control rounded-0 font-18" >

					<label for="c_password" class="font-josefin font-18 mt-4"><b>Confirm Password*</b></label>
					<input type="password" name="c_password" class="form-control rounded-0 font-18">


					<input type="submit" value="Update" class="btn btn-primary rounded-0 mt-4">
				</div>
			</div>
			<div class="col-12 col-lg-6">
			  <div class="card p-3 rounded-0">
				<h3 style="border-bottom: 1px solid rgba(0,0,0,0.125)" class="font-josefin">Permission</h3>
				


				@php 
					$par_array = ['post','category','email','comment','about','privacy','settings'];
				@endphp

				@for($i = 0; $i<7; $i++)

					@if(in_array($par_array[$i], $psermissionArray))
						<div class="row mt-3">
							<div class="col-6">
								<h3 class="font-josefin font-25 mt-1 text-capitalize">{{$i+1}} .{{$par_array[$i]}}</h3>
							</div>
							<div class="col-6">
								<div class="toggleCheck chk3">
								  <input type="checkbox" id="{{$par_array[$i]}}" name="permission[]" value="{{$par_array[$i]}}" checked>
								  <label for="{{$par_array[$i]}}">
								    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
								  </label>
								</div>
							</div>
						</div>
					@else
						<div class="row mt-3">
							<div class="col-6">
								<h3 class="font-josefin font-25 mt-1 text-capitalize">{{$i+1}} .{{$par_array[$i]}}</h3>
							</div>
							<div class="col-6">
								<div class="toggleCheck chk3">
								  <input type="checkbox" id="{{$par_array[$i]}}" name="permission[]" value="{{$par_array[$i]}}" >
								  <label for="{{$par_array[$i]}}">
								    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
								  </label>
								</div>
							</div>
						</div>
					@endif
				@endfor

				
			  </div>
			</div>
		</div>
	 
	  </form>
	 <!-- website info area end -->
@endsection

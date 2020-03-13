@extends('admin.layouts.master')
@section('title')
<title>{{$my->name}}</title>
@endsection
@section('page-top')
<a href="{{route('profile')}}" class="font-josefin">Profile</a>
<h1 class="font-josefin font-25">Update Profile</h1>
@endsection


@section('content')

<form action="">
	<div class="row mt-20">
		<div class="col-12 col-lg-8">
			<div class="card p-3">
				<h1 class="font-josefin font-25 text-center">Update Information</h1>
				<div class="row mt-3">
					<div class="col-12 col-lg-6">
						<label for="name" class="font-josefin font-18"><b>Name*</b></label>
						<input type="text" name="name" value="{{$my->name}}" class="form-control rounded-0 font-18">
					</div>

					<div class="col-12 col-lg-6">
						<label for="phone" class="font-josefin font-18"><b>Phone*</b></label>
						<input type="text" name="phone" value="{{$my->phone}}" class="form-control rounded-0 font-18">
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-12 col-lg-6">
						<label for="address" class="font-josefin font-18"><b>Address*</b></label>
						<textarea name="address" id="address" cols="30" rows="5" class="form-control font-josefin font-josefin rounded-0"></textarea>
						
					</div>
					<div class="col-12 col-lg-6">
						<label for="about" class="font-josefin font-18"><b>About*</b></label>
						<textarea name="about" id="about" cols="30" rows="5" class="form-control font-josefin font-josefin rounded-0"></textarea>
						
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-12 col-lg-6">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ea, eius officiis, vitae id laboriosam voluptates possimus totam culpa tempora optio cupiditate. Blanditiis possimus ratione amet ipsa eveniet aliquam autem fugit magnam repellendus consequatur ipsum maxime voluptate, consectetur asperiores sequi. Eligendi minus vel omnis ex, sunt expedita quas reiciendis quidem inventore, repellat accusantium consectetur necessitatibus cupiditate ut provident error, laborum odio eius nostrum sequi aliquid. Quas alias pariatur aliquam facilis sed omnis ipsam accusamus deleniti quibusdam voluptatibus unde itaque provident, quae vel dolore magni rerum quisquam amet eligendi eum. Voluptas beatae minus voluptatum, vero eligendi sint esse doloribus quaerat nisi.
					</div>

					<div class="col-12 col-lg-6">
						<label for="image" class="font-josefin font-18"><b>Image*</b></label>
						<input type="file" name="image" class="form-control rounded-0">
						<input type="submit" name="submit" value="Update" class="form-control rounded-0 mt-3 btn_1 font-18 font-pt">
						
					</div>
				</div>

			</div>
		</div>

		<div class="col-12 col-lg-4">
			<div class="card p-3">
				<h1 class="font-josefin font-25 text-center">Change Password</h1>
				<label for="password" class="font-josefin font-18 mt-3"><b>Old Password*</b></label>
				<input type="password" name="password"  class="form-control rounded-0 font-18">
		
				<label for="c_password" class="font-josefin font-18 mt-3"><b>Confirm Password*</b></label>
				<input type="password" name="c_password"  class="form-control rounded-0 font-18">
				



				<input type="submit" name="submit" value="Change" class="form-control rounded-0 mt-3 btn_1 font-18 font-pt">
						
				
			</div>
		</div>
	</div>
</form>

@endsection

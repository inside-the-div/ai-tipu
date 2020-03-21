@extends('admin.layouts.master')
@section('title')
<title>Email send</title>
@endsection
@section('page-top')
<a href="{{route('home')}}" class="font-josefin">Home</a>
<h1 class="font-josefin font-25">Send email</h1>
@endsection

@section('content')

	<div class="row">
		<div class="col-12 col-lg-6 offset-lg-3">
			<div class="card p-3">
				<h2 class="font-25 font-josefin mb-3">Send an email</h2>

				<form action="{{route('send-custom-email')}}" method="post">
					@csrf
					<div class="row">
						<div class="col-lg-6 col-12">
							<label class="font-16 font-josefin" for="subject"><b>Email *</b></label>
							<input type="email" name="email" class="form-control rounded-0" value="{{old('email')}}">
						</div>

						<div class="col-lg-6 col-12">
							<label class="font-16 font-josefin" for="subject" ><b>Subject *</b></label>
							<input type="text" name="subject" class="form-control rounded-0" value="{{old('subject')}}">
						</div>
					</div>
					<label class="font-16 font-josefin mt-3" for="message"><b>Message *</b></label>
					<textarea name="message"  cols="30" rows="10" class="form-control rounded-0 ">{{old('message')}}</textarea>

					<input type="submit" class="form-control btn_1 mt-3" value="Send" id="send-btn"> 
				</form>
				
			</div>
		</div>
	</div>
@endsection


@section('custom-js')
	<script>

		$(document).ready(function(){

			

			var m = '<p class="text-info font-18 font-josefin text-center mb-2">Please wait email sending ...</p>';
			$('#send-btn').click(function(){
				 $("#success-message").html(m);
			})
			
		})
	</script>
@endsection
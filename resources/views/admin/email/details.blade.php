@extends('admin.layouts.master')
@section('title')
<title>{{$email->name}}</title>
@endsection
@section('page-top')
<a href="{{route('emails')}}" class="font-josefin">All Emails</a>
<h1 class="font-josefin font-25">Email Details</h1>
@endsection

@section('content')

	<div class="row mt-4">
		<div class="col-12 col-xl-6 offset-xl-3">
			<div class="single-email p-3" id="single-email" data-id="{{$email->id}}">
				<h1 class="font-20 font-josefin mb-1">Name: {{$email->name}}</h1>
				<h2 class="font-18 font-josefin mb-1">Email: {{$email->email}}</h2>
				<h2 class="font-18 font-josefin mb-4">Subject: {{$email->subject}}</h2>
				<p class="font-16 font-pt mb-3">{{$email->message}}</p>


				<div class="row mt-4">
				  <div class="col-4">
				    <div class="text-left">
				      <span class="font-josefin font-16">Date: {{$email->created_at->format('Y-m-d')}}</span>
				    </div>
				  </div>
				  <div class="col-8">
				    <form action="{{route('email-delete')}}" method="post" class="d-inline" >
				      @csrf
				      <input type="hidden" value="{{$email->id}}" name="id">
				      <input type="submit" value="Delete" class="single-email-btn font-josefin bg-danger border-0" style="cursor: pointer;">
				    </form>


				    <button  data-email="{{$email->email}}" type="button" class="single-email-btn font-josefin bg-info border-0 replay-btn" data-toggle="modal" data-target="#exampleModal">Replay</button>
				  </div>
				</div>

			</div>
		</div>
	</div>
	 <!-- Modal -->
	 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog" role="document">
	     <div class="modal-content">
	       <div class="modal-header">
	         <h5 class="modal-title" id="exampleModalLabel">Replay Email</h5>
	         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	           <span aria-hidden="true">&times;</span>
	         </button>
	       </div>
	       <div class="modal-body">
	         
	     <form action="{{route('send-custom-email')}}" method="post">
	       @csrf
	       <label for="email" class="font-josefin font-16"><b>Email*</b></label>
	       <input type="email" name="email" class="form-control rounded-0" value="" id="ready-email">
	       <label for="subject" class="mt-2 font-josefin font-16"><b>Subject*</b></label>
	       <input type="text" name="subject" class="form-control rounded-0">

	       <label for="message" class="mt-2 font-josefin font-16"><b>Message*</b></label>
	       <textarea name="message"  cols="30" rows="5" class="form-control rounded-0 font-18"></textarea>
	       <input type="submit" class="btn_1 mt-2" value="Replay" id="email-send-btn"> 
	     </form>

	       </div>

	     </div>
	   </div>
	 </div>
	@endsection


	@section('custom-js')
	<script>
	    $(document).ready(function() {
	      $(".replay-btn").click(function(){
	        var email = $(this).data('email');
	        $("#ready-email").val(email);
	      })

	    });
	</script>
	@endsection
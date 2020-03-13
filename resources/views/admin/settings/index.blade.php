@extends('admin.layouts.master')
@section('title')
<title>Add category</title>
@endsection
@section('page-top')
<a href="{{route('home')}}" class="font-josefin">Home</a>
<h1 class="font-josefin font-25">Update settings</h1>
@endsection


@section('content')
	<div class="row mt-2">
	  <div class="col-12 col-lg-10 offset-lg-1">
	  	<form action="{{route('settings-update')}}" method="post">
		    <div class="card rounded-0 p-3">
				@csrf

				<div class="row">
					<div class="col-12 col-lg-6">
						<label for="logo" class="mt-2"><b>Logo*</b></label>
						<input type="file" name="logo" id="logo" class="form-control rounded-0">
					</div>
					<div class="col-12 col-lg-6">
						<label for="icon" class="mt-2"><b>Fev-icon*</b></label>
						<input type="file" name="icon" id="icon" class="form-control rounded-0">
					</div>
				</div>
		        <label for="title"><b>Title*</b></label>
		        <input type="text" name="title" id="title" class="form-control rounded-0" value="{{$settings->title}}">

				<div class="row">
					<div class="col-12 col-lg-6">
						<label for="tag" class="mt-2"><b>Tag*</b></label>
						<textarea class="form-control rounded-0"  id="tag" name="tag" rows="5">{{$settings->tag}}</textarea>
					</div>
					<div class="col-12 col-lg-6">
						<label for="description" class="mt-2"><b>Description*</b></label>
						<textarea class="form-control rounded-0"  id="description" name="description"  rows="5">{{$settings->description}}</textarea>
					</div>
				</div>




				<div class="row">
					<div class="col-12 col-lg-6">
						<label for="facebook" class="mt-2"><b>Facebook*</b></label>
						<input type="text" name="facebook" id="facebook" class="form-control rounded-0" value="{{$settings->facebook}}">
					</div>
					<div class="col-12 col-lg-6">
						<label for="youtube" class="mt-2"><b>Youtube*</b></label>
						<input type="text" name="youtube" id="youtube" class="form-control rounded-0" value="{{$settings->youtube}}">
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-lg-6">
						<label for="email" class="mt-2"><b>Email*</b></label>
						<input type="email" name="email" id="email" class="form-control rounded-0" value="{{$settings->email}}">
					</div>
					<div class="col-12 col-lg-6">
						<label for="copyright" class="mt-2"><b>Copyright*</b></label>
						<input type="text" name="copyright" id="copyright" class="form-control rounded-0" value="{{$settings->copyright}}">
					</div>
				</div>

		   		<label for="heading" class="mt-2"><b>Heading*</b></label>
		   		<textarea class="form-control rounded-0"  id="heading" name="heading" rows="4">{{$settings->heading}}</textarea>
				
				<input type="submit" class="btn_1 mt-2" value="Update">
		       	
		      	
		    </div>
	    </form>
	  </div>
	</div>
@endsection
@section('custom-js')
<script>


  $(document).ready(function() {
    $('#heading').summernote({

      placeholder: 'Post body',
      tabsize: 4,
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  });

</script>
@endsection

@extends('admin.layouts.master')
@section('title')
<title>About Page</title>
@endsection
@section('page-top')
<a href="{{route('home')}}" class="font-josefin">Home</a>
<h1 class="font-josefin font-25">About About us page</h1>
@endsection


@section('content')
<form action="{{route('about-update')}}" method="POST">
	@csrf;
	<div class="row mt-20">
		<div class="col-12 col-lg-10 offset-lg-1">
			<div class="card p-3">
				<label for="about" class="font-josefin font-18"><b>About*</b></label>
				<textarea name="about"   id="about">{{$about->about}}</textarea>
				<div class="row">
					<div class="col-lg-6 col-12">
						<label for="tag" class="font-josefin font-18 mt-3"><b>Tag*</b></label>
						<textarea name="tag"  cols="30" rows="5" class="form-control rounded-0">{{$about->tag}}</textarea>
					</div>
					<div class="col-12 col-lg-6">
						<label for="description" class="font-josefin font-18 mt-3"><b>Description*</b></label>
						<textarea name="description"  cols="30" rows="5" class="form-control rounded-0">{{$about->description}}</textarea>
					</div>
				</div>

				<input type="submit" name="submit" value="Update" class="btn_1 mt-3">
			</div>
		</div>
	</div>
</form>

@endsection
@section('custom-js')
<script>


  $(document).ready(function() {
    $('#about').summernote({

      placeholder: 'Post body',
      tabsize: 4,
      height: 400,
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
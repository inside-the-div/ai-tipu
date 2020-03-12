@extends('admin.layouts.master')
@section('title')
<title>{{$post->title}}</title>
@endsection
@section('page-top')
<a href="{{route('posts')}}" class="font-josefin">All Posts</a>
<h1 class="font-josefin font-25">Update this post</h1>
@endsection

@section('content')
<form action="{{route('post-update')}}" method="POST" enctype="multipart/form-data">
  <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
  <input type="hidden" value="{{$post->id}}" name="id">
  @csrf
  <div class="row mt-4">
    <div class="col-12 col-lg-6">
      <div class="card rounded-0 p-3">
        <label for="poem_name"><b>Title*</b></label>
        <input type="text" name="title" id="poem_name" class="form-control rounded-0" value="{{ $post->title }}">

        <label for="writer_name" class="mt-3"><b>Writer Name*</b></label>
        <input type="text" name="writer" id="writer_name" class="form-control rounded-0" value="{{ $post->writer}}">

        <label for="type" class="mt-3"><b>Type*</b></label>
        <select name="type" id="type" class="form-control rounded-0">
          <option  class="font-josefin font-16 py-2" value="golpo" @if($post->type == 'golpo') selected @endif>Golpo</option>
          <option  class="font-josefin font-16 py-2" value="kobita" @if($post->type == 'kobita') selected @endif>Kobita</option>
          <option  class="font-josefin font-16 py-2" value="upponas" @if($post->type == 'upponas') selected @endif>Upponas</option>
        </select>

        <label for="category" class="mt-3"><b>Category*</b></label>
        <select name="category[]" id="category" class="form-control rounded-0" multiple>
          @foreach($categories as $category)

          @if(in_array($category->name,$cat_array))
          <option class="font-josefin font-16 py-2" value="{{$category->id}}" selected>{{$category->name}}</option>

          @else
          <option class="font-josefin font-16 py-2" value="{{$category->id}}">{{$category->name}}</option>
          @endif

          @endforeach
        </select>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div class="card rounded-0 p-3">
      	<label for="image"><b>Image*</b></label>
        <div class="row">

        	<div class="col-12 col-lg-6">
        		
        		<input type="file" name="image" id="image" class="form-control rounded-0" >
        	</div>
        	<div class="col-12 col-lg-6">
        		<button type="button" class="btn btn-info rounded-0" data-toggle="modal" data-target="#image-modal">Show image</button>
        	</div>
        </div>

        <label for="video" class="mt-2"><b>Youtube Video URL</b></label>
        <input type="text" class="form-control rounded-0" name="video"  value="{{ $post->video }}">
        <label for="tag" class="mt-2"><b>Tag* (<span class="text-info">For SEO</span>)</b></label>
        <textarea name="tag" id="tag" cols="30" rows="4" class="form-control rounded-0" placeholder="example: tag_1,tag_2,tag_3">{{ $post->tag }}</textarea>
        <label for="description" class="mt-2"><b>Short Description between 50–160 characters* (<span class="text-info">For SEO</span>)</b></label>
        <textarea name="description" id="description" cols="30" rows="4" class="form-control rounded-0">{{ $post->description }}</textarea>
      </div>
    </div>

    <div class="col-12 col-lg-10 offset-lg-1 my-2">
      <div class="card p-3">
        <label for="poem_body" class="mt-2"><b>Post Body*</b></label>
        <textarea  id="poem_body" name="body">{{ $post->body }}</textarea>
		
        <input type="submit" value="Upload" name="submit" class="btn btn-info my-3 form-control">
      </div>
    </div>
  </div>
</form>

<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="">
      </div>

    </div>
  </div>
</div>


@endsection

@section('custom-js')
<script>


  $(document).ready(function() {
    $('#poem_body').summernote({

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

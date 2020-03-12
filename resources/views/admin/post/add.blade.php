@extends('admin.layouts.master')
@section('title')
<title>Add a new post</title>
@endsection
@section('page-top')
<a href="" class="font-josefin">All Posts </a>
<h1 class="font-josefin font-25">Add new Post</h1>
@endsection

@section('content')
<form action="{{route('post-store')}}" method="POST" enctype="multipart/form-data">
  <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
  @csrf
  <div class="row mt-4">
    <div class="col-12 col-lg-6">
      <div class="card rounded-0 p-3">
        <label for="poem_name"><b>Title*</b></label>
        <input type="text" name="title" id="poem_name" class="form-control rounded-0" value="{{ old('title') }}">

        <label for="writer_name" class="mt-3"><b>Writer Name*</b></label>
        <input type="text" name="writer" id="writer_name" class="form-control rounded-0" value="{{ old('writer') }}">

        <label for="type" class="mt-3"><b>Type*</b></label>
        <select name="type" id="type" class="form-control rounded-0">
          <option  class="font-josefin font-16 py-2" value="golpo">Golpo</option>
          <option  class="font-josefin font-16 py-2" value="kobita">Kobita</option>
          <option  class="font-josefin font-16 py-2" value="upponas">Upponas</option>
        </select>

        <label for="category" class="mt-3"><b>Category*</b></label>
        <select name="category[]" id="category" class="form-control rounded-0" multiple>
          @foreach($categories as $category)
          <option class="font-josefin font-16 py-2" value="{{$category->id}}">{{$category->name}}</option>

          @endforeach
        </select>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div class="card rounded-0 p-3">
        <label for="image"><b>Image*</b></label>
        <input type="file" name="image" id="image" class="form-control rounded-0" >

        <label for="video" class="mt-2"><b>Youtube Video URL</b></label>
        <input type="text" class="form-control rounded-0" name="video"  value="{{ old('video') }}">
        <label for="tag" class="mt-2"><b>Tag* (<span class="text-info">For SEO</span>)</b></label>
        <textarea name="tag" id="tag" cols="30" rows="4" class="form-control rounded-0" placeholder="example: tag_1,tag_2,tag_3">{{ old('tag') }}</textarea>
        <label for="description" class="mt-2"><b>Short Description between 50–160 characters* (<span class="text-info">For SEO</span>)</b></label>
        <textarea name="description" id="description" cols="30" rows="4" class="form-control rounded-0">{{ old('description') }}</textarea>
      </div>
    </div>

    <div class="col-12 col-lg-10 offset-lg-1 my-2">
      <div class="card p-3">
        <label for="poem_body" class="mt-2"><b>Post Body*</b></label>
        <textarea  id="poem_body" name="body">{{ old('body') }}</textarea>

        <input type="submit" value="Upload" name="submit" class="btn btn-info my-3 form-control">
      </div>
    </div>
  </div>
</form>
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

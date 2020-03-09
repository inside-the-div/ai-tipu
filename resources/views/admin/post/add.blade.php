@extends('admin.layouts.master')
@section('title')
<title>Add a new post</title>
@endsection
@section('page-top')
<a href="" class="font-josefin">All Posts</a>
<h1 class="font-josefin font-25">Add new Post</h1>
@endsection

@section('content')

  <div class="row mt-4">
        <div class="col-12 col-lg-6">
          <div class="card rounded-0 p-3">
      
              <label for="poem_name"><b>Title*</b></label>
              <input type="text" name="poem_name" id="poem_name" class="form-control rounded-0">

              <label for="writer_name" class="mt-2"><b>Writer Name*</b></label>
              <input type="text" name="writer_name" id="writer_name" class="form-control rounded-0">


              <label for="poem_body" class="mt-2"><b>Post Body*</b></label>
              <textarea  id="poem_body" name="poem_body"></textarea>

              <a href="" class="btn btn-info mt-2 rounded-0">Upload</a>      
          </div>
        </div>


        <div class="col-12 col-lg-6">
          <div class="card rounded-0 p-3">
        
              <label for="image"><b>Image*</b></label>
              <input type="file" name="image" id="image" class="form-control rounded-0">

              <label for="category" class="mt-2"><b>Category*</b></label>
              <select name="category" id="category" class="form-control rounded-0" multiple>
                <option class="font-josefin font-16 py-2" value="">Category 1</option>
                <option class="font-josefin font-16 py-2" value="">Category 1</option>
                <option class="font-josefin font-16 py-2" value="">Category 1</option>
                <option class="font-josefin font-16 py-2" value="">Category 1</option>
                <option class="font-josefin font-16 py-2" value="">Category 1</option>
              </select>


              <label for="video" class="mt-3"><b>Youtube Video URL</b></label>
              <input type="text" class="form-control rounded-0" id="video">


             <label for="tag" class="mt-3"><b>Tag* (<span class="text-info">For SEO</span>)</b></label>
             <textarea name="" id="tag" cols="30" rows="4" class="form-control rounded-0"></textarea>

             <label for="description" class="mt-3"><b>Short Description between 50–160 characters* (<span class="text-info">For SEO</span>)</b></label>
             <textarea name="" id="description" cols="30" rows="5" class="form-control rounded-0"></textarea>

             
            
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

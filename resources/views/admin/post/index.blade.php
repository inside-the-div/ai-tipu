@extends('admin.layouts.master')
@section('title')
<title>All posts</title>
@endsection
<!-- content area start -->

@section('page-top')
<a href="{{route('add-posts')}}" class="font-josefin">Add new post</a>
<h1 class="font-josefin font-25 mb-2">All posts</h1>
<div id="post-delete-message">
  
</div>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card p-3 rounded-0 table-responsive">

          <table class="table table-striped table-dark display " id="dataTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Writer</th>
                <th scope="col">Date</th>
                <th scope="col">Post By</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($posts as $index => $post)
                <tr>
                  <th scope="row">{{++$index}}</th>
                  <td><a href="{{route('post-show',['id' => $post->id])}}" class="text-light">{{$post->title}}</a></td>
                  <td>{{$post->writer}}</td>
                  <td>{{$post->created_at->format('d/m/Y')}}</td>
                  <td><a href="{{route('user-show',['id' => $post->user->id])}}" class="text-light">{{$post->user->name}}</a></td>
                  <td><a href="{{route('post-edit',['id' => $post->id])}}" class="btn btn-info rounded-0">Edit</a></td>
                  <td><button class="btn btn-danger rounded-0 post-delete-btn" data-id="{{$post->id}}">Delete</button></td>
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
        </div>
      </div>
@endsection
<!-- content area end -->


@section('custom-js')
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $(document).ready(function(){

      var delete_message = '<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">Post delete success !!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';



      $(".post-delete-btn").click(function(){
        var id = $(this).data('id');

        var this_tr = $(this).parent().parent();
      
        if (confirm("Are you sure want to delete?")) {
            $.ajax({
               type:'POST',
               url:'/admin/post-delete',
               data:{id:id},
               success:function(data){
                  $("#post-delete-message").html(delete_message);
                  this_tr.hide();
               }
            });
        }


      })
    })
  </script>
@endsection

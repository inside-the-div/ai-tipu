@extends('admin.layouts.master')
@section('title')
<title>All Comments</title>
@endsection
<!-- content area start -->

@section('page-top')
<a href="{{route('home')}}" class="font-josefin">Home</a>
<h1 class="font-josefin font-25 mb-2">All Comments</h1>
<div id="comment-delete-message">
  
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
                <th scope="col">Email</th>
                <th scope="col">Text</th>
                <th scope="col">Date</th>
                <th scope="col">Active</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($comments as $index => $comment)
                <tr>
                  <td scope="row">{{++$index}}</td>
                  <td><a href="{{route('comment-show',['id' => $comment->id])}}" class="text-light">{{$comment->name}}</a></td>
                  <td>{{ $comment->email}}</td>
                  <td>{{ substr($comment->text,0,10)}}</td>
                  <td>{{$comment->created_at->format('d/m/Y')}}</td>
                  <td>
                  	@if($comment->active == 0)
                  	<form action="{{route('comment-active')}}" method="POST">
                  		@csrf
                  		<input type="hidden" name="id" value="{{$comment->id}}">
                  		<input type="submit" value="Approve " class="btn btn-info rounded-0">
                  	</form>
                  	@endif

                  	@if($comment->active == 1)
                  	<form action="{{route('comment-not-active')}}" method="POST">
                  		@csrf
                  		<input type="hidden" name="id" value="{{$comment->id}}">
                  		<input type="submit" value="Disapprove" class="btn btn-primary rounded-0">
                  	</form>
                  	@endif

                  </td>
                  <td><button class="btn btn-danger rounded-0 comment-delete-btn" data-id="{{$comment->id}}">Delete</button></td>
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

      var delete_message = '<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">comment delete success !!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';



      $(".comment-delete-btn").click(function(){
        var id = $(this).data('id');

        var this_tr = $(this).parent().parent();
      
        if (confirm("Are you sure want to delete?")) {
            $.ajax({
               type:'POST',
               url:'/admin/comment-delete',
               data:{id:id},
               success:function(data){
                  $("#comment-delete-message").html(delete_message);
                  this_tr.hide();
               }
            });
        }


      })
    })
  </script>
@endsection

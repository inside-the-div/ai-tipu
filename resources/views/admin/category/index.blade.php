@extends('admin.layouts.master')
@section('title')
<title>All Categories</title>
@endsection
<!-- content area start -->

@section('page-top')
<a href="{{route('add-category')}}" class="font-josefin">Add new category</a>
<h1 class="font-josefin font-25 mb-2">All Categories</h1>
<div id="category-delete-message">
  
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
                <th scope="col">Date</th>
                <th scope="col">Added By</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($categories as $index => $category)
                <tr>
                  <th scope="row">{{++$index}}</th>
                  <td>{{$category->name}}</td>
                  <td>{{$category->created_at->format('d/m/Y')}}</td>
                  <td><a href="" class="text-light">{{$category->user->name}}</a></td>
                  <td><a href="{{route('category-show',['id' => $category->id])}}" class="btn btn-success rounded-0">Details</a></td>
                  <td><a href="{{route('category-edit',['id'=>$category->id])}}" class="btn btn-info rounded-0">Edit</a></td>
                  <td><button class="btn btn-danger rounded-0 category-delete-btn" data-id="{{$category->id}}">Delete</button></td>
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

      var delete_message = '<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">category delete success !!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';



      $(".category-delete-btn").click(function(){
        var id = $(this).data('id');

        var this_tr = $(this).parent().parent();
      
        if (confirm("Are you sure want to delete?")) {
            $.ajax({
               type:'POST',
               url:'/admin/category-delete',
               data:{id:id},
               success:function(data){
                  $("#category-delete-message").html(delete_message);
                  this_tr.hide();
               }
            });
        }


      })
    })
  </script>
@endsection

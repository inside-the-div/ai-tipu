@extends('admin.layouts.master')
@section('title')
<title>All users</title>
@endsection
@section('page-top')
<a href="{{route('user-add')}}" class="font-josefin">Add user</a>
<h1 class="font-josefin font-25">All users</h1>
<div id="user-delete-message"></div>
@endsection


@section('content')

<!-- website info area start  -->
 <div class="row mt-20 mx-1">
       <div class="col-12">
         <div class="card p-3 rounded-0 table-responsive">

         <table class="table table-striped table-dark display " id="dataTable">
           <thead>
             <tr>
               <th scope="col">No</th>
               <th scope="col">Name</th>
               <th scope="col">Date</th>
               <th scope="col">Email</th>
               <th scope="col">Password</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
        @php 
          $i= 0;
        @endphp
        @foreach($users as $user)
          @php 
            $i++;
          @endphp
             <tr>
               <th scope="row">{{$i}}</th>
               <td>{{$user->name}}</td>
               <td>{{$user->created_at->format('Y / m / d')}}</td>
               <td>{{$user->email}}</td>
               <td><a href="" class="text-light">{{$user->unhash}}</a></td>
               <td>
                  <a href="{{route('user-show',['id' => $user->id])}}" class="btn btn-success rounded-0">View</a>
                  <a href="{{route('user-edit',['id' => $user->id])}}" class="btn btn-info rounded-0">Edit</a>
                  <button class="btn btn-danger rounded-0 user-delete-btn" data-id="{{$user->id}}">Delete</button>
               </td>
             </tr>
           @endforeach
           </tbody>
         </table>
         </div>
       </div>
  
 </div>
 <!-- website info area end -->


@endsection
@section('custom-js')
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $(document).ready(function(){

      var delete_message = '<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">user delete success !!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';



      $(".user-delete-btn").click(function(){
        var id = $(this).data('id');

        var this_tr = $(this).parent().parent();
      
        if (confirm("Are you sure want to delete?")) {
            $.ajax({
               type:'POST',
               url:'/admin/user-delete',
               data:{id:id},
               success:function(data){
                  $("#user-delete-message").html(delete_message);
                  this_tr.hide();
               }
            });
        }


      })
    })
  </script>
@endsection
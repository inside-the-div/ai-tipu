@extends('admin.layouts.master')
@section('title')
<title>Dashboard</title>
@endsection
@section('page-top')
<a href="{{route('home')}}" class="font-josefin">Home</a>
<h1 class="font-josefin font-25">Dashboard</h1>
@endsection

@section('content')

<div class="row mt-3">
	<div class="col-3">
		<div class="card p-3 bg-info ">
			<h3 class="text-center font-25 text-light font-pt">Total Posts</h3>
			<h3 class="text-center  display-3 text-light font-josefin">{{count($posts)}}</h3>
		</div>
	</div>
	<div class="col-3">
		<div class="card p-3 bg-success ">
			<h3 class="text-center font-25 text-light font-pt">Total Category</h3>
			<h3 class="text-center  display-3 text-light font-josefin">{{count($categorys)}}</h3>
		</div>
	</div>
	<div class="col-3">
		<div class="card p-3 bg-dark ">
			<h3 class="text-center font-25 text-light font-pt">Total Comments</h3>
			<h3 class="text-center  display-3 text-light font-josefin">{{count($comments)}}</h3>
		</div>
	</div>

	<div class="col-3">
		<div class="card p-3 bg-primary ">
			<h3 class="text-center font-25 text-light font-pt">Total Emails</h3>
			<h3 class="text-center  display-3 text-light font-josefin">{{count($emails)}}</h3>
		</div>
	</div>
</div>


<!-- website info area start  -->
 <div class="row mt-20">
       <div class="col-12 col-lg-6">
         <div class="card p-3 rounded-0 table-responsive">
		<span class="font-josefin font-18 mb-2">Recent 10 Posts.</span>
         <table class="table table-striped table-info display ">
           <thead>
             <tr>
               <th scope="col">No</th>
               <th scope="col">Title</th>
               <th scope="col">Date</th>
               <th scope="col">Posted By</th>
             </tr>
           </thead>
           <tbody>
        @php 
          $i= 0;
        @endphp
        @foreach($posts as $post)
          @php 
            $i++;
          @endphp
             <tr>
               <th scope="row">{{$i}}</th>
               <td class="font-pt font-18">{{$post->title}}</td>
               <td class="font-pt font-18">{{$post->created_at->format('Y-m-d')}}</td>
               <td class="font-pt font-18">{{$post->user->name}}</td>
             </tr>
             <?php 
             	if($i == 10)
             		break;
             ?>

           @endforeach
           </tbody>
         </table>
         </div>
       </div>


		<div class="col-12 col-lg-6">
		  <div class="card p-3 rounded-0 table-responsive">
		<span class="font-josefin font-18 mb-2">Recent 10 Comments.</span>
		  <table class="table table-striped table-success display ">
		    <thead>
		      <tr>
		        <th scope="col">No</th>
		        <th scope="col">User Name</th>
		        <th scope="col">Post title</th>
		        <th scope="col">Date</th>
		      </tr>
		    </thead>
		    <tbody>
		 @php 
		   $i= 0;
		 @endphp
		 @foreach($comments as $comment)
		   @php 
		     $i++;
		   @endphp
		      <tr>
		        <th scope="row">{{$i}}</th>
		        <td class="font-pt font-18">{{$comment->name}}</td>
		        <td class="font-pt font-18">{{$comment->post->title}}</td>
		        <td class="font-pt font-18">{{$comment->created_at->format('Y-m-d')}}</td>
		      </tr>
		      <?php 
		      	if($i == 10)
		      		break;
		      ?>
		    @endforeach
		    </tbody>
		  </table>
		  </div>
		</div>



 </div>
 <!-- website info area end -->
@endsection
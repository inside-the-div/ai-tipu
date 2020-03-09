@extends('admin.layouts.master')
@section('title')
<title>All posts</title>
@endsection
<!-- content area start -->

@section('page-top')
<a href="{{route('add-posts')}}" class="font-josefin">Add new post</a>
<h1 class="font-josefin font-25 mb-2">All posts</h1>
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
                <th scope="col">Post By</th>
                <th scope="col">Active</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark asd asd asd asd asd asd</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="" class="btn btn-success rounded-0">Active</a></td>
                <td><a href="" class="btn btn-info rounded-0">Edit</a></td>
                <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
              </tr>

            </tbody>
          </table>
          </div>
        </div>
      </div>
@endsection
<!-- content area end -->

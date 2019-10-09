@extends('welcome')
@section('content')
	<div class="container">
		<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-warning" href="{{route('all.category')}}">All Categories</a>
        <hr>
        <ul>
          <li>Category Name: {{$category->name}}</li>
          <li>Slug Name: {{$category->slug}}</li>
          <li>Created Date: {{$category->created_at}}</li>
        </ul>
      </div>
    </div>
	</div>
@endsection
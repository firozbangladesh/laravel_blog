@extends('welcome')
@section('content')
	<div class="container">
		<div class="row">
	      	<div class="col-lg-8 col-md-10 mx-auto">
	      		<a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        		<a class="btn btn-warning" href="{{route('all.category')}}">All Categories</a>
	      		@if($errors->any())
	      			<div class="alert alert-danger">
	      				<ul>
	      					@foreach($errors->all() as $error)
	      						<li>{{$error}}</li>
	      					@endforeach
	      				</ul>
	      			</div>
	      		@endif
	        <form action="{{url('update/category/'.$category->id)}}" method="post">
	        	@csrf
	          <div class="control-group">
	            <div class="form-group floating-label-form-group controls">
	              <label>Category Name</label>
	              <input type="text" class="form-control" value="{{$category->name}}" name="name">
	            </div>
	          </div>
	          <div class="control-group">
	            <div class="form-group floating-label-form-group controls">
	              <label>Slug Name</label>
	              <input type="text" class="form-control" value="{{$category->slug}}" name="slug">
	            </div>
	          </div>
	          
	          <br>
	          <div id="success"></div>
	          <div class="form-group">
	            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
	          </div>
	        </form>
	      </div>
	    </div>
	</div>
@endsection
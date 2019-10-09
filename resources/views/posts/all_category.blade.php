@extends('welcome')
@section('content')
	<div class="container">
		<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-warning" href="{{route('all.category')}}">All Categories</a>
        <hr>
        <table style="width:130%;" class="table table-responsive table-hover">
        	<tr>
        		<th>SL.</th>
        		<th>Name</th>
        		<th>Slug</th>
        		<th>Created at</th>
        		<th>Action</th>
        	</tr>
        	@foreach ($category as $row)
        	<tr>
        		<td>{{$row->id}}</td>
        		<td>{{$row->name}}</td>
        		<td>{{$row->slug}}</td>
        		<td>{{$row->created_at}}</td>
        		<td>
        			<a class="btn btn-success" href="{{URL::to('view/category/'.$row->id)}}">View</a>
        			<a class="btn btn-warning" href="{{URL::to('edit/category/'.$row->id)}}">Edit</a>
        			<a id="delete" class="btn btn-danger" href="{{URL::to('delete/category/'.$row->id)}}">Delete</a>
        		</td>
        	</tr>
        	@endforeach
        </table>
      </div>
    </div>
	</div>
@endsection
@extends('welcome')
@section('content')
	<div class="container">
		<div class="row">
      <div class="col-lg-12 mx-auto">
        <a class="btn btn-success" href="{{route('writepost')}}">Write Post</a>
        <hr>
        <table style="width:130%;" class="table table-responsive table-hover">
        	<tr>
        		<th>SL.</th>
        		<th>Category</th>
        		<th>Title</th>
        		<th>Image</th>
        		<th>Action</th>
        	</tr>
        	@foreach ($post as $row)
        	<tr>
        		<td>{{$row->id}}</td>
        		<td>{{$row->name}}</td>
        		<td>{{$row->title}}</td>
        		<td><img src="{{URL::to($row->image)}}" style="width:40px;"></td>
        		<td>
        			<a class="btn btn-success" href="{{URL::to('view/post/'.$row->id)}}">View</a>
        			<a class="btn btn-warning" href="{{URL::to('edit/post/'.$row->id)}}">Edit</a>
        			<a id="delete" class="btn btn-danger" href="{{URL::to('delete/post/'.$row->id)}}">Delete</a>
        		</td>
        	</tr>
        	@endforeach
        </table>
      </div>
    </div>
	</div>
@endsection
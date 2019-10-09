@extends('welcome')
@section('content')
	<div class="container">
		<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a class="btn btn-info" href="{{route('all.post')}}">All Posts</a>
        <hr>
        <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <select class="form-control" name="category_id">
                @foreach($category as $row)
              	<option value="{{$row->id}}"<?php if($post->category_id == $row->id) echo "selected";?>>{{$row->name}}</option>
                @endforeach
              </select>
              <br>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image</label>
              <img src="{{URL::to($post->image)}}" style="height:160px; float:right;margin-bottom:-50px;margin-top:-18px;">
              <input type="file" class="form-control" name="image">
              <input type="hidden" class="form-control" name="old_image" value="{{$post->image}}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" name="details">{{$post->details}}</textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
	</div>
@endsection
@extends('welcome')
@section('content')
	<div class="container">
		<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-warning" href="{{route('all.category')}}">All Categories</a>
        <a class="btn btn-info" href="{{route('all.post')}}">All Posts</a>
        <hr>
        <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Write Post Title" name="title">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <select class="form-control" name="category_id">
                @foreach($category as $row)
              	<option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
              <br>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image</label>
              <input type="file" class="form-control" name="image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Write Details" name="details"></textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
	</div>
@endsection
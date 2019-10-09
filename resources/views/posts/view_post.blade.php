@extends('welcome')
@section('content')
	<div class="container">
		<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a class="btn btn-success" href="{{route('writepost')}}">Write Post</a>
        <a class="btn btn-success" href="{{route('all.post')}}">All Post</a>
        <hr>
        <div>
        	<h2>{{$post->title}}<br><small><a href="">{{$post->name}}</a></small></h2>
        	<img src="{{URL::to($post->image)}}" style="width:150px;">
        	<hr>
        	<p style="color:orange; font-style:italic;">{{$post->details}}</p>
        </div>
      </div>
    </div>
	</div>
@endsection
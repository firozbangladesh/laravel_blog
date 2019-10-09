@extends('welcome')
@section('content')
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($post as $row)
        <div class="post-preview">
          <a href="{{URL::to('view/post/'.$row->id)}}">
            <h2 class="post-title">
              {{$row->title}}
            </h2>
            <h3 class="post-subtitle">
              Excerpt details are goes here
            </h3>
          </a>
          <p class="post-meta">Category: 
            <a href="#">{{$row->name}}</a>
            on {{$row->created_at}}</p>
        </div>
        <hr>
        @endforeach
        
        <!-- Pager -->
        <div class="clearfix">
          {{$post->links()}}
        </div>
      </div>
    </div>
@endsection
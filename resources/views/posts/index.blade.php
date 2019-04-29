@extends('layouts.app')

@section('content')
<h1>Your plog posts</h1><hr>
<a href="/posts/create" class="btn btn-primary">Create post</a><hr>

	@if(count($posts) >0)
	    <h1>Posts</h1><hr>
		@foreach($posts as $post)
			<div class="well">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<img style="width: 100%" src="/storage/cover_image/{{$post->cover_image}}">
					</div>
					<div class="col-md-8 col-sm-8">
						<h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
						<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
					</div>
				</div>
				
			</div>
		@endforeach
	@else
		<p>No posts found</p>
	@endif
	
@endsection
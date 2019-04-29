@extends('layouts.app')

@section('content')

	<h1>{{$post->title}}</h1>
	<hr>
	<img style="width: 100%" src="/storage/cover_image/{{$post->cover_image}}">
	<br><br>
	<div>
		{!! $post->body !!}
	</div>	
	<hr>
	<small>Written on {{$post->created_at}}</small>
	<hr>
	@if(!Auth::guest())
		@if(Auth::user()->id ==$post->user_id)
		<table>
			<tr>
				<td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{!!Form::open(['action' => ['PostsController@destroy',$post->id],
                                    'method'=>'POST',
                                    'class'=>'pull-right'
                                    ])
                                    !!}
                                    {{ Form::hidden('_method','DELETE') }}
                                    {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                </td>
            </tr>
        </table>
			
		@endif
	@endif
@endsection
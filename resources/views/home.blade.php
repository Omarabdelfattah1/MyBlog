@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">HOME</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!Auth::guest())

                    <a href="/posts/create" class="btn btn-primary">Create post</a>
                    <h3>Your plog posts</h3>
                    <table class="table table-striped">
                       <tr>
                           <td>
                              Title 
                           </td>
                           <td></td>
                           <td></td>
                       </tr>
                        @foreach($posts as $post)
                           
                            <tr>
                                <td>{{$post->title}}</td>
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
                        @endforeach
                   </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card-header">
                    <h1>

                        {{$profile ->name}}
                        <small>since  {{$profile->created_at->diffForHumans()}}</small>
                    </h1>
                </div>
                @foreach($posts as $post)
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="level">
                        <span class="flex">
                              <a href="{{route('profile',$post->creator->name)}}">{{$post->creator->name}}</a> Posted:
                              <a href="/{{$post->path()}}">{{$post->title}}</a>
                        </span>
                                <span>
                            {{$post->created_at->diffForHumans()}}
                        </span>
                            </div>
                        </div>

                        <div class="card-body">


                            <article>

                                <div class="body">{{$post->body}}</div>
                            </article>


                        </div>

                    </div>
                @endforeach
                {!! $posts->links() !!}
            </div>
        </div>


    </div>
@endsection

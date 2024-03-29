@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            @forelse($posts as $post)
            <div class="card mt-4">
                <div class="card-header">
                    <div class="level">

                    <h4 class="flex">
                    <a href="/{{$post->path()}}">
                        @if(auth()->check() && $post->hasUpdatesFor(auth()->id()))
                            <strong>

                                {{$post->title}}
                            </strong>
                        @else
                            {{$post->title}}
                        @endif
                    </a>
                    </h4>
                        <a href="{{$post->path()}}">{{$post->replies_count}} {{\Illuminate\Support\Str::plural('comment',$post->replies_count)}}</a>
                    </div>
                </div>
                <div class="card-body">




                        <div class="body">{{$post->body}}</div>



                </div>
                <div class="card-footer">
                    {{$post->visits()->count()}} visits
                </div>
            </div>
            @empty
                <p>there are no posts</p>
            @endforelse

        </div>
        <div class="col-md-4 ">
            <div class="card card-default mt-4">
                <div class="card-header">
                    trending posts
                </div>
                <div class="card-body">
                    <ul class="list-group">
                    @foreach($trending as $post)
                      <li class="list-group-item">  <a href="{{url($post['path'])}}">{{$post['title']}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

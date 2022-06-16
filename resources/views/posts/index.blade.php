@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($posts as $post)
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="level">
                    <h4 class="flex">
                    <a href="{{$post->path()}}">{{$post->title}}</a></h4>
                        <a href="{{$post->path()}}">{{$post->replies_count}} {{\Illuminate\Support\Str::plural('comment',$post->replies_count)}}</a>
                    </div>
                </div>
                <div class="card-body">


                    <article>

                        <div class="body">{{$post->body}}</div>
                    </article>


                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

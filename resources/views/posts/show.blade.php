@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{$post->creator->name}}</a> Posted:
                    {{$post->title}}</div>

                <div class="card-body">


                    <article>

                        <div class="body">{{$post->body}}</div>
                    </article>


                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="offset-2 col-md-8 mt-2">
            @foreach($post->replies as $reply)
                @include('posts/reply')
            @endforeach
        </div>
    </div>
    @if (auth()->check())


    <div class="row justify-content-center">
        <div class="offset-2 col-md-8 mt-2">
                <form method="post" action="{{route('add.reply',[$post->channel->slug,$post->id])}}">
                    @csrf
                    <div class="form-group">
                    <textarea name="body" id="body" class="form-control"  rows="3" placeholder="Have something to say?"></textarea>
                    </div>

                    <button type="submit">Post</button>
                </form>
        </div>
    </div>
    @else
        <p class="text-center">Please <a href="{{route('login')}}">Sign in </a> to participate in this discusion</p>
    @endif
</div>

@endsection

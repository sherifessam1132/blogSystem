@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($posts as $post)
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">  <h4>
                    <a href="{{$post->path()}}">{{$post->title}}</a></h4></div>

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

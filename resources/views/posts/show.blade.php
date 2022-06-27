@extends('layouts.app')

@section('content')
    <post-view :init-replies-count="{{$post->replies_count}}" inline-template>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="level">
                                    <span class="flex">
                                        <a href="{{route('profile',$post->creator->name)}}">
                                            {{$post->creator->name}}</a> Posted:
                                            {{$post->title}}
                                    </span>
                                    @can('update',$post)
                                    <form action="/{{$post->path()}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link">Delete</button>
                                    </form>
                                    @endcan
                                </div>
                                </div>

                            <div class="card-body">


                                <article>

                                    <div class="body">{{$post->body}}</div>
                                </article>


                            </div>

                        </div>
                        <replies :data="{{$post->replies}}" @removed="repliesCount --"></replies>



                        @if (auth()->check())



                            <form method="post" action="{{route('add.reply',[$post->channel->slug,$post->id])}}">
                                @csrf
                                <div class="form-group mt-5">
                                    <textarea name="body" id="body" class="form-control"  rows="3" placeholder="Have something to say?"></textarea>
                                </div>

                                <button type="submit">Post</button>
                            </form>

                        @else
                            <p class="text-center">Please <a href="{{route('login')}}">Sign in </a> to participate in this discusion</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body">
                                <p>this posts was published by {{$post->created_at->diffForHumans()}} by
                                    <a href="#"> {{$post->creator->name}} </a>
                                    and currently Has <span v-text="repliesCount"></span> Comments</p>
                            </div>

                        </div>
                    </div>

                </div>




            </div>
    </post-view>
@endsection


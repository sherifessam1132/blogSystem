@extends('layouts.app')

@section('content')
    <post-view :init-replies-count="{{$post->replies_count}}" inline-template>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="level">
                                    <img src="{{$post->creator->avatar()}}" class="mr-1" alt="avatar" width="25" height="25">
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
                        <replies
                                 @added="repliesCount ++"
                                 @removed="repliesCount --"></replies>




                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body">
                                <p>this posts was published by {{$post->created_at->diffForHumans()}} by
                                    <a href="#"> {{$post->creator->name}} </a>
                                    and currently Has <span v-text="repliesCount"></span> Comments</p>

                                <p>
                                    <subscribe-button :active="{{ json_encode($post->isSubscribed)    }}"></subscribe-button>

                                </p>
                            </div>

                        </div>
                    </div>

                </div>




            </div>
    </post-view>
@endsection


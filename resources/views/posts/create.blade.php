@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">  <h4>Create new post</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{route('posts.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="body">body</label>
                            <textarea name="body" id="body" class="form-control"  rows="8">{{old('body')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="channel_id">choose a channel...</label>
                            <select name="channel_id"  class="form-control" >
                                <option value="">choose one...</option>
                                @foreach ($channels  as $channel)
                                    <option value="{{$channel->id}}" {{old('channel_id') == $channel->id ? 'selected':''}}>{{$channel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Publish</button>
                    </form>
                    @if (count($errors))
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach

                        </ul>
                    @endif



                </div>
            </div>
        </div>
    </div>

</div>
@endsection

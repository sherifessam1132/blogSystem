<div class="card mt-5 ">
    <div class="card-header">
        <div class="level">
            <h5 class="flex">
                <a href="#" >  {{$reply->owner->name}} </a>
                Said
                <span class="float-right">
                {{$reply->created_at->diffForHumans()}}... </span>
            </h5>
            <div>

                <form method="post" action="/replies/{{$reply->id}}/favorites">
                    @csrf
                    <button class="btn btn-secondary" {{$reply->isFavorited ? "disabled":'' }}> {{$reply->favorites()->count()}} {{\Illuminate\Support\Str::plural('favorite',$reply->favorites()->count())}} </button>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">


            {{$reply->body}}


    </div>
    {!! $replies->links()!!}
</div>

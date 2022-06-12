<div class="card mt-2 ">
    <div class="card-header">
        <a href="">  {{$reply->owner->name}} </a>
        Said
        <span class="float-right">
        {{$reply->created_at->diffForHumans()}}... </span>

    </div>

    <div class="card-body">


            {{$reply->body}}


    </div>
</div>

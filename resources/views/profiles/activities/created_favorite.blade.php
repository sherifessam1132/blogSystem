@component('profiles.activities.activity')
    @slot('heading')
        <a href="#" class="font-weight-bold text-dark-75 text-hover-primary">{{$profile->name}}</a>   favorited a reply:
{{--        <a href="{{$activity->subject->post->path()}}"> "{{$activity->subject?$activity->subject->title:''}}"</a>--}}
    @endslot
    @slot('body')
        <!--begin::Info-->
        <div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
            <div>

                <span class="text-muted">{{$activity->subject->favorite->body}}</span>
            </div>
            <div class="mt-2">
                <span class="label label-light-primary font-weight-bold label-inline mr-1">inbox</span>
                <span class="label label-light-danger font-weight-bold label-inline">task</span>
            </div>
        </div>
        <!--end::Info-->
        <!--begin::Datetime-->
        <div class="mt-2 mr-3 font-weight-bolder w-50px text-right" data-toggle="view">
{{--            {{$activity->subject?$activity->subject->created_at->diffForHumans():''}}--}}
        </div>
        <!--end::Datetime-->
    @endslot
@endcomponent

@extends('layouts.app')

@section('css')

    <link href="{{asset('plugins/global/plugins.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.bundle.css?v=7.0.3')}}" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('css/themes/layout/header/base/light.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/themes/layout/header/menu/light.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/themes/layout/brand/dark.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/themes/layout/aside/dark.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card-header">
                    <h1>

                        {{$profile ->name}}
                        <small>since  {{$profile->created_at->diffForHumans()}}</small>
                    </h1>
                </div>
                @foreach($activities as $data => $activity)
                    <h3>{{$data}}</h3>

                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include("profiles.activities.{$record->type}",['activity'=>$record])
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>


    </div>
@endsection
@section('scripts')
    <script src="{{asset('plugins/global/plugins.bundle.js?v=7.0.3')}}"></script>
    <script src="{{asset('plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3')}}"></script>
    <script src="{{asset('js/scripts.bundle.js?v=7.0.3')}}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('js/pages/custom/inbox/inbox.js?v=7.0.3')}}"></script>
@endsection



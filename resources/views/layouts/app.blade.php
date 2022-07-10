<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')

    <style>
        body{
            padding-bottom: 100px;
        }
        .level{
            display:flex;
            align-items: center;
        }
        .flex{
            flex: 1;
        }
        .mr-2{
            margin-right: 1em;
        }
    </style>
    <script>
        window.App={!!json_encode([
                         'csrfToken'=>csrf_token(),
                         'user'=>\Illuminate\Support\Facades\Auth::user(),
                         'signedIn'=>\Illuminate\Support\Facades\Auth::check()
                    ])
            !!}
    </script>
</head>
<body style="padding-bottom:100px;">
    <div id="app">
        @include('layouts.nav')


        <main class="py-4">
            @yield('content')
            <flash message="{{ session('flash') }}" ></flash>
        </main>
    </div>
    @yield('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

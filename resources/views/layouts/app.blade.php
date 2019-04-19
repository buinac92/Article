<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/froala_editor.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/align.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/code_beautifier.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/code_view.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/colors.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/draggable.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/emoticons.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/font_size.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/font_family.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/image.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/file.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/image_manager.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/line_breaker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/link.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/lists.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/paragraph_format.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/paragraph_style.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/video.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/table.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/url.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/entities.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/char_counter.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/inline_style.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/save.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/fullscreen.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/quick_insert.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/quote.min.js')}}"></script>

    <script>
        $(function() {
            $('#edit').froalaEditor({
                theme: 'dark'
            })
        });

    </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/froala_editor.css')}}">
    <link rel="stylesheet" href="{{ asset('css/froala_style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/code_view.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/colors.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/emoticons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/image_manager.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/image.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/line_breaker.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/table.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/char_counter.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/video.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/fullscreen.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/quick_insert.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/file.css')}}">

    <link rel="stylesheet" href="{{ asset('css/themes/dark.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('article.index') }}">{{ __('article') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


</body>


</html>

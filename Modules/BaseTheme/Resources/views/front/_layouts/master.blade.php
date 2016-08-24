<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" data-viewport>
@include('basetheme::front._layouts._partials.hiddenCredits')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="@yield('metaDescription', 'Site Description')">
    <link rel="canonical" href="@yield('canonical', request()->url())" />

    <title>
        @hasSection ('title')
            @yield('title') - App Name
        @else
            App Name
        @endif
    </title>

    <link rel="stylesheet" href="{{ elixir('css/front.css') }}">

    @include('basetheme::front._layouts._partials.meta')
    @include('basetheme::front._layouts._partials.favicons')
    @include('basetheme::front._layouts._partials.bugsnag')
</head>
<body>
    {{-- @include('googletagmanager::script') --}}
    @include('basetheme::front._layouts._partials.deprecatedBrowser')
    @include('basetheme::front._layouts._partials.navbar')
    @yield('subMenu')
    @include('basetheme::front._layouts._partials.flashMessage')
    <div class="app-container">
        <div class="main">
            @yield('content')
        </div>
    </div>
    <footer class="app-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-push-3">
                    <ul class="list-inline text-right">
                        <li>
                            <a href="#">
                                Link 1
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Link 2
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Link 3
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 col-sm-pull-9">
                    <p><span class="footer-brand"> App </span> &copy; {{ Date('Y') }} <a href="http://oliver.mx">Oliver</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="{{ elixir('js/front.js') }}"></script>

</body>
</html>
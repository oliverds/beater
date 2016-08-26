<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" data-viewport>
@include('basetheme::back._layouts._partials.hiddenCredits')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="@yield('metaDescription', 'Site Description')">
    <link rel="canonical" href="@yield('canonical', request()->url())" />

    <title>
        @hasSection ('title')
            @yield('title') - {!! config('app.name') !!}
        @else
            {!! config('app.name') !!}
        @endif
    </title>

    @if(! app()->environment('production'))
        <link rel="stylesheet" href="/css/back.css">
    @else
        <link rel="stylesheet" href="{{ elixir('css/back.css') }}">
    @endif

    @include('basetheme::back._layouts._partials.meta')
    @include('basetheme::back._layouts._partials.favicons')
    @include('basetheme::back._layouts._partials.bugsnag')
</head>
<body>
    @include('basetheme::back._layouts._partials.deprecatedBrowser')

    <div class="app-container">
        @include('basetheme::back._layouts._partials.navbar')
        @yield('subMenu')
        <div class="content-container">
            <div class="container-fluid">
                @include('basetheme::back._layouts._partials.flashMessage')
                @yield('content')
            </div>
        </div>
    </div>

    @if(! app()->environment('production'))
        <script src="/js/back.js"></script>
    @else
        <script src="{{ elixir('js/back.js') }}"></script>
    @endif

</body>
</html>
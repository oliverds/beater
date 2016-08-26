@section('meta')

    @hasSection ('title')
        <meta name="title" content="@yield('title') - {!! config('app.name') !!}">
    @else
        <meta name="title" content="{!! config('app.name') !!}">
    @endif
    <meta name="description" content="@yield('pageDescription')">

    <meta property="og:url" content="@yield('canonical', request()->url())">
    <meta property="og:type" content="website">
    @hasSection ('title')
        <meta property="og:title" content="@yield('title') - {!! config('app.name') !!}">
    @else
        <meta property="og:title" content="{!! config('laravel-permission.table_names.users') !!}">
    @endif
    <meta property="og:description" content="@yield('pageDescription')">
    <meta property="og:image" content="{{ url('/images/og-image.png') }}">

@show
@section('meta')

    @hasSection ('title')
        <meta name="title" content="@yield('title') - App Name">
    @else
        <meta name="title" content="App Name">
    @endif
    <meta name="description" content="@yield('pageDescription')">

    <meta property="og:url" content="@yield('canonical', request()->url())">
    <meta property="og:type" content="website">
    @hasSection ('title')
        <meta property="og:title" content="@yield('title') - App Name">
    @else
        <meta property="og:title" content="App Name">
    @endif
    <meta property="og:description" content="@yield('pageDescription')">
    <meta property="og:image" content="{{ url('/images/og-image.png') }}">

@show
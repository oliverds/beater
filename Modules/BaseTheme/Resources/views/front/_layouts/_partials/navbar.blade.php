<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {!! config('app.name') !!}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="text-sm text-uppercase"><a href="#">Link A</a></li>
                <li class="text-sm text-uppercase active"><a href="#">Link B</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <!-- Authentication Links -->
            @if (Auth::guest())
                <a href="{{ route('register') }}" class="btn btn-primary-outline navbar-btn navbar-right">
                    <span class="text-bold">Register</span>
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown text-sm">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="text-bold">{{ Auth::user()->name }}</span> &nbsp;
                            <img class="img-circle img-profile" src="{{ Gravatar::get(Auth::user()->email, ['size' => 30]) }}"> 
                            <i class="fa fa-fw fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('settings.index') }}"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
                            <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Control Panel</li>
                                <li><a href="#"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout.post') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off fa-fw"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout.post') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
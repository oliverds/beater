<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#"><i class="fa fa-code fa-fw" aria-hidden="true"></i> cp</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-nav navbar-top navbar-right">
        <li>
            <a href="{{ url('/') }}">
                <i class="text-muted fa {{ Request::isSecure() ? 'fa-lock' : 'fa-unlock' }}"></i>
                {{ Request::getHost() }}
            </a>
        </li>
        <li>
            <a href="#" class="dropdown-toggle text-sm" data-toggle="dropdown" role="button" aria-expanded="false">
                <img class="img-circle img-profile" src="{{ Gravatar::get(Auth::user()->email, ['size' => 30]) }}"> 
                <span class="text-bold">{{ Auth::user()->name }}</span>
                <i class="fa fa-fw fa-angle-down"></i>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('settings.index') }}"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('logout.post') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off fa-fw"></i>
            </a>

            <form id="logout-form" action="{{ route('logout.post') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-side">
            <li>
                <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="nav-header">Content</li>
            <li>
                <a href="#"><i class="fa fa-fw fa-sitemap"></i> Pages</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-folder"></i> Assets</a>
            </li>
            <li class="nav-header">Configure</li>
            <li>
                <a href="#"><i class="fa fa-fw fa-cog"></i> Settings</a>
            </li>
            <li class="active">
                <a href="#" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-angle-down"></i></a>
                <ul id="users" class="collapse">
                    <li class="active">
                        <a href="#">Users</a>
                    </li>
                    <li>
                        <a href="#">Roles</a>
                    </li>
                </ul>
            </li>
            <li class="footer">
                <p class="text-center">
                    <span class="text-thin">Laravel v. {{ app()->version() }}</span>
                </p>
                <div class="text-center">
                    @if (app()->environment() == 'production')
                        <button type="button" class="btn btn-uppercase btn-success">
                            <i class="fa fa-plane fa-btn"></i> Production
                        </button>
                    @else
                        <button type="button" class="btn btn-uppercase btn-danger">
                            <i class="fa fa-wrench fa-btn"></i> Test
                        </button>
                    @endif
                </div>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
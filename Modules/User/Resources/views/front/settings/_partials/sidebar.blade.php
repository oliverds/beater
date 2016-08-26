<div class="col-md-4 col-lg-3 col-lg-offset-1">
    <div class="panel panel-primary">
        <div class="list-group">
            <a class="list-group-item {{ Request::is('settings/account*') ? 'active' : '' }}" 
            	href="{{ route('settings.account.update') }}">
            	
                @if(Request::is('settings/account*'))
                    <span class="pull-right"> <i class="fa fa-minus fa-rotate-90 text-primary"></i> </span>
                @endif

                Account
            </a>

            <a class="list-group-item {{ Request::is('settings/password*') ? 'active' : '' }}" 
                href="{{ route('settings.password.update') }}">
                
                @if(Request::is('settings/password*'))
                    <span class="pull-right"> <i class="fa fa-minus fa-rotate-90 text-primary"></i> </span>
                @endif

                Password
            </a>
        </div>
    </div>
</div>

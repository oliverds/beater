@extends('basetheme::front._layouts.master')

@section('title', 'Edit Your Password')
@section('metaDescription', '')

@section('content')
    <div class="container">
        <div class="row">
        	<div class="col-md-12 col-lg-10 col-lg-push-1">
        		<div class="page-header">
        			<h1><span class="text-thinner">Edit Your Password</span></h1>
        		</div>
        	</div>
        	@include('user::front.settings._partials.sidebar')
            <div class="col-md-8 col-lg-7">
                <div class="panel panel-form">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Password
                        </div>
                    </div>
                    <div class="panel-body">
                    	<form class="form-horizontal" role="form" method="POST" action="{{ route('settings.password.update') }}">
                    		<input name="_method" type="hidden" value="PATCH">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                <label for="old_password" class="col-md-4 control-label">Old Password</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control" name="old_password">

                                    @if ($errors->has('old_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">New Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-uppercase">
                                        <i class="fa fa-btn fa-floppy-o"></i> 
                                        Save
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
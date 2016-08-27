@extends('basetheme::front._layouts.master')

@section('title', 'Edit Your Account Settings')
@section('metaDescription', '')

@section('content')
    <div class="container">
        <div class="row">
        	<div class="col-md-12 col-lg-10 col-lg-push-1">
        		<div class="page-header">
        			<h1><span class="text-thinner">Edit Your Account Settings</span></h1>
        		</div>
        	</div>
        	@include('user::front.settings._partials.sidebar')
            <div class="col-md-8 col-lg-7">
                <div class="panel panel-form">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Account
                        </div>
                    </div>
                    <div class="panel-body">
                    	<form class="form-horizontal" role="form" method="POST" action="{{ route('settings.account.update') }}">
                    		<input name="_method" type="hidden" value="PATCH">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <p class="form-control-static">
                                        <img class="img-circle img-profile" src="{{ Gravatar::get(Auth::user()->email, ['size' => 32]) }}"> 
                                        You can set this avatar on <a href="https://gravatar.com" target="_blank">gravatar.com</a>
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="username" 
                                    	type="text" 
                                    	class="form-control" 
                                    	name="username" 
                                    	value="{{ $user->username or old('username') }}" 
                                    	autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" 
                                    	type="text" 
                                    	class="form-control" 
                                    	name="name" 
                                    	value="{{ $user->name or old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" 
                                    	type="email" 
                                    	class="form-control" 
                                    	name="email" 
                                    	value="{{ $user->email or old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
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
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
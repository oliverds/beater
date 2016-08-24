@extends('basetheme::front._layouts.master')

@section('title', 'Login')
@section('metaDescription', 'Meta Description')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <div class="panel panel-form">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Reset Password
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email.post') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>
                            
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-uppercase">
                                        <i class="fa fa-btn fa-envelope"></i> 
                                        Send Password Reset Link
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
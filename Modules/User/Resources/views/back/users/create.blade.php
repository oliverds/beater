@extends('basetheme::back._layouts.master')

@section('title', 'Create a User')

@section('content')

    <h1 class="page-header">
        <span class="text-thinner">Create a User</span>
    </h1>

    <div class="row">
        <div class="col-md-8 col-lg-7">
            <div class="panel panel-form">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('cp.users.store') }}">
                        @include("user::back.users._partials.form")
                        @include("user::back.users._partials.password")
                        <hr>
                        @include("user::back.users._partials.submit")
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
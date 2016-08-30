@extends('basetheme::back._layouts.master')

@section('title', 'Users')

@section('content')

    <h1 class="page-header">
        <span class="text-thinner">{{ $user->username }}</span>
    </h1>

    <div class="row">
        <div class="col-md-8 col-lg-7">
            <div class="panel panel-form">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('cp.user.update', $user->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        @include("user::back.users._partials.form")
                        @if($user->isCurrentUser())
                            @include("user::back.users._partials.password")
                        @endif
                        <hr>
                        @include("user::back.users._partials.submit")
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('basetheme::back._layouts.master')

@section('title', 'Create a Role')

@section('content')

    <h1 class="page-header">
        <span class="text-thinner">Create a Role</span>
    </h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-form">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('cp.user.role.store') }}">
                        @include("permission::back.roles._partials.form")
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
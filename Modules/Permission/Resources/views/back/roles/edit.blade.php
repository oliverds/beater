@extends('basetheme::back._layouts.master')

@section('title', 'Users')

@section('content')

    <h1 class="page-header">
        <span class="text-thinner">{{ $role->name }}</span>
    </h1>

    <div class="row">
        <div class="col-md-8 col-lg-7">
            <div class="panel panel-form">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('cp.roles.update', $role->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        @include("permission::back.roles._partials.form")
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
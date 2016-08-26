@extends('basetheme::front._layouts.master')

@section('title', 'Welcome')
@section('metaDescription', 'Meta Description')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1 class="text-center">
                    	<span class="text-thinner text-uppercase">
                    		@if (Auth::guest())
                    			Welcome                    		
                    		@else
                    			Welcome, {{ Auth::user()->name }}
                    		@endif
                    	</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
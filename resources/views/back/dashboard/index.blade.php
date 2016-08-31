@extends('basetheme::back._layouts.master')

@section('title', 'Dashboard')
@section('metaDescription', 'Meta Description')

@section('content')

    <div class="row">
        <div class="col-xs-6">
            <h1 class="page-header">
                <span class="text-thinner">Dashboard</span>
            </h1>
        </div>
    </div>

    <div class="panel panel-table">
    	<div class="panel-heading">
		    <h3 class="panel-title">Recent Activity</h3>
		</div>
        @if (count($logItems) > 0)
            <table class="table" data-datatable data-order='[[ 0, "asc" ]]'>
                <thead>
                    <tr>
                        <th> Time </th>
                        <th> Description </th>
                        <th> User </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($logItems as $logItem)
                        <tr data-row-id="{{ $logItem->id }}">
                            <td> {{ $logItem->created_at->diffForHumans() }} </td>
                            <td>
                                {{ $logItem->description }}
                            </td>
                            <td> {{ $logItem->causer['username'] or '' }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection
@extends('basetheme::back._layouts.master')

@section('title', 'Roles')

@section('content')

    <div class="row">
        <div class="col-xs-6">
            <h1 class="page-header">
                <span class="text-thinner">Roles</span>
            </h1>
        </div>
        <div class="col-xs-6">
            <a href="{{ route('cp.roles.create') }}" class="btn btn-primary btn-uppercase pull-right">
                Create Role
            </a>
        </div>
    </div>

    <div class="panel panel-table">
        @if (count($roles) > 0)
            <table class="table" data-datatable data-order='[[ 0, "asc" ]]'>
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th data-orderable="false"> </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($roles as $role)
                        <tr data-row-id="{{ $role->id }}">
                            <th scope="row"> {{ $role->id }} </th>
                            <td>
                                <a href="{{ route('cp.roles.show', $role->id) }}"> {{ $role->name }} </a>
                            </td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-link btn-more dropdown-toggle" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="{{ route('cp.roles.edit', $role->id) }}">
                                                <i class="fa fa-fw fa-pencil"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cp.roles.destroy', $role->id) }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('delete-{{ $role->id }}').submit();">
                                                <i class="fa fa-fw fa-times"></i> Delete
                                            </a>

                                            <form id="delete-{{ $role->id }}" action="{{ route('cp.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                                <input name="_method" type="hidden" value="DELETE">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection
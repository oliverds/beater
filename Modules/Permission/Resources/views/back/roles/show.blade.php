@extends('basetheme::back._layouts.master')

@section('title', 'Roles')

@section('content')

    <h1 class="page-header">
        <span class="text-thinner">{{ $role->name }}</span>
    </h1>

    <div class="panel panel-table">
        @if (count($role->users) > 0)
            <table class="table" data-datatable data-order='[[ 0, "asc" ]]'>
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Username </th>
                        <th> Email </th>
                        <th data-orderable="false"> </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($role->users as $user)
                        <tr data-row-id="{{ $user->id }}">
                            <th scope="row"> {{ $user->id }} </th>
                            <td>
                                <a href="{{ route('cp.user.edit', $user->id) }}"> {{ $user->name }} </a>
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->email }}
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
                                            <a href="{{ route('cp.user.edit', $user->id) }}">
                                                <i class="fa fa-fw fa-pencil"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cp.user.delete', $user->id) }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('delete-{{ $user->id }}').submit();">
                                                <i class="fa fa-fw fa-times"></i> Delete
                                            </a>

                                            <form id="delete-{{ $user->id }}" action="{{ route('cp.user.delete', $user->id) }}" method="POST" style="display: none;">
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
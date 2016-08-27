@extends('basetheme::back._layouts.master')

@section('title', 'Users')

@section('content')

    <h1 class="page-header">
        <span class="text-thinner">Users</span>
    </h1>

    <div class="panel panel-table">
        @if (count($users) > 0)
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
                    @foreach($users as $user)
                        <tr data-row-id="{{ $user->id }}">
                            <th scope="row"> {{ $user->id }} </th>
                            <td>
                                <a href="{{ route('cp.users.edit', $user->id) }}"> {{ $user->name }} </a>
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-link btn-xs dropdown-toggle" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ route('cp.users.edit', $user->id) }}">Edit</a></li>
                                        <li>
                                            <a href="{{ route('cp.users.destroy', $user->id) }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('delete-{{ $user->id }}').submit();">
                                                Delete
                                            </a>

                                            <form id="delete-{{ $user->id }}" action="{{ route('cp.users.destroy', $user->id) }}" method="POST" style="display: none;">
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
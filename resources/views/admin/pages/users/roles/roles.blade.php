@extends('adminlte::page')

@section('title', "Cargos do usuário {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Users</a></li>
    </ol><br>

    <h1>Cargos do usuário <b>{{ $user->name }}</b></h1>
        @can('add_roles')
            <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> &nbsp;ADD NOVO CARGO</a>  
        @endcan
        
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width: 10px;">
                                @can('del_perm')
                                    <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
            
        </div>
    </div>
@stop
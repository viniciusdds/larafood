@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="active">Cargos</a></li>
    </ol><br>

    <h1>Perfis 
        @can('add_roles')
            <a href="{{ route('roles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> &nbsp;ADD</a>
        @endcan
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.search') }}" method="post" class="form form-inline">
                @csrf

                <div class="form-group">
                    <input type="text" name="filter" placeholder="Pesquisa" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                </div>
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width: 10px;">
                                @can('edit_roles')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Editar</a>
                                @endcan
                                @can('del_roles')
                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">VER</a>
                                @endcan    
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
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
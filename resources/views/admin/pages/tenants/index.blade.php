@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}" class="active">Empresas</a></li>
    </ol><br>

    <h1>Empresas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" method="post" class="form form-inline">
                @csrf

                <div class="form-group">
                    <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                </div>
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="100">Imagem</th>
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->title }}" style="max-width: 90px;">
                            </td>
                            <td>{{ $tenant->name }}</td>
                            <td style="width: 10px;">
                                @can('edit_tenant')
                                    <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info">Editar</a> 
                                @endcan
                                @can('del_tenant')
                                    <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning">VER</a>    
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif
            
        </div>
    </div>
@stop
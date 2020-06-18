@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" class="active">Categorias</a></li>
    </ol><br>

    <h1>Categorias 
        @can('add_cat')
        <a href="{{ route('categories.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> &nbsp;ADD</a>
        @endcan
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" method="post" class="form form-inline">
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
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td style="width: 10px;">
                                @can('edit_cat')
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Editar</a>
                                @endcan
                                @can('del_cat')
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">VER</a>
                                @endcan            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
            
        </div>
    </div>
@stop
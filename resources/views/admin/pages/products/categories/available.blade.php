@extends('adminlte::page')

@section('title', "Categorias disponíveis para o produto {$product->title}")

@section('content_header')
    <style>
        input[type='checkbox']{
            cursor: pointer;
        }
    </style>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.categories', $product->id) }}" class="active">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.categories.available', $product->id) }}" class="active">Disponíveis</a></li>
    </ol><br>

    <h1>Categorias disponíveis para o produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.categories.available', $product->id) }}" method="post" class="form form-inline">
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
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('products.categories.attach', $product->id) }}" method="post">
                        @csrf

                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
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
@extends('adminlte::page')

@section('title', "Detalhes do produto {$product->title}")

@section('content_header')
    <h1>Detalhes do produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            &emsp;&emsp;<img src="{{ asset("storage/{$product->image}") }}" alt="{{ $product->title }}"  style="max-width: 90px;"><br><br>
            <ul>
                <li>
                    <strong>Título: </strong> {{ $product->title }}
                </li>
                <li>
                    <strong>Flag: </strong> {{ $product->flag }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $product->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categories.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> &nbsp;{{ $product->title }}</button>
            </form>
        <div>
    </div>
@endsection
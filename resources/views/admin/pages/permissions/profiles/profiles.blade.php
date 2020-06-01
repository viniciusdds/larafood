@extends('adminlte::page')

@section('title', "Perfis da Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Perfis</a></li>
    </ol><br>

    <h1>Perfis da Permissão <b>{{ $permission->name }}</b></h1>
    
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('permissions.profiles.detach', [$permission->id, $profile->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
            
        </div>
    </div>
@stop
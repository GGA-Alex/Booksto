<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Editar Usuario</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Listado de usuario</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cambiar Rol</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Editar usuario: {{ $usuario->name }}</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @livewire('usuario-form',['usuario' => $usuario])
            </div>

        </div>
    </div>
@endsection

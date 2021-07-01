<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Formulario Categoria</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Listado de Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Formulario Categoria</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Formulario de categorias</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @if (isset($categoria))
                    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                        @method('PATCH')
                    @else
                        <form action="{{ route('categorias.store') }}" method="POST">
                @endif

                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        value="{{ old('nombre') ?? ($categoria->nombre ?? '') }}">
                    <x-jet-input-error for="nombre" />
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                        value="{{ old('descripcion') ?? ($categoria->descripcion ?? '') }}" />
                    <x-jet-input-error for="descripcion" />
                </div>
                <input type="submit" class="btn btn-dark" value="Guardar categoria"></input>
                </form>
            </div>
        </div>
    </div>
@endsection

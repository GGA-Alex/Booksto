<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Agregar Editorial</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('editoriales.index') }}">Listado de Editoriales</a></li>
                <li class="breadcrumb-item active" aria-current="page">Formulario</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Formulario de editoriales</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @if (isset($editoriale))
                    <form action="{{ route('editoriales.update', $editoriale) }}" method="POST">
                        @method('PATCH')
                    @else
                        <form action="{{ route('editoriales.store') }}" method="POST">
                @endif

                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        value="{{ old('nombre') ?? ($editoriale->nombre ?? '') }}">
                    <x-jet-input-error for="nombre" />
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ old('direccion') ?? ($editoriale->direccion ?? '') }}">
                    <x-jet-input-error for="direccion" />
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        value="{{ old('telefono') ?? ($editoriale->telefono ?? '') }}">
                    <x-jet-input-error for="telefono" />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ old('email') ?? ($editoriale->email ?? '') }}">
                    <x-jet-input-error for="email" />
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" class="form-control" name="ciudad" id="ciudad"
                        value="{{ old('ciudad') ?? ($editoriale->ciudad ?? '') }}"></input>
                    <x-jet-input-error for="ciudad" />
                </div>
                <input type="submit" class="btn btn-dark" value="Guardar editorial"></input>
                </form>
            </div>
        </div>
    </div>
@endsection

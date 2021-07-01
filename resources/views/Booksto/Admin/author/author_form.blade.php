<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Formulario Autores</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('autores.index') }}">Autores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Formulario autores</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Agregar autor</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="{{ route('autores.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control border-gray-300 rounded-lg" name="nombre" id="nombre"
                            value="{{ old('nombre') }}">
                        <x-jet-input-error for="nombre" />
                    </div>
                    <div class="form-group">
                        <label for="pais">País:</label>
                        <input type="text" class="form-control border-gray-300 rounded-lg" name="pais" id="pais"
                            value="{{ old('pais') }}">
                        <x-jet-input-error for="pais" />
                    </div>
                    <input type="submit" class="btn btn-primary mt-2 " value="Guardar autor"></input>
                </form>
            </div>
        </div>
    </div>
@endsection

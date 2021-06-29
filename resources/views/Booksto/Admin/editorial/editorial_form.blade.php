@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Agregar Editorial</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert text-white bg-danger" role="alert">
                                <div class="iq-alert-text">{{ $error }}</div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                        @endforeach
                    </ul>
                @endif
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
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ old('nombre') ?? ($editoriale->direccion ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        value="{{ old('nombre') ?? ($editoriale->telefono ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ old('nombre') ?? ($editoriale->email ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" class="form-control" name="ciudad" id="ciudad"
                        value="{{ old('descripcion') ?? ($editoriale->ciudad ?? '') }}"></input>
                </div>
                <input type="submit" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
@endsection

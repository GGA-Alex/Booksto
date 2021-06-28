@extends('layouts\Booksto - Layouts\bookstoForm')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Agregar Categoria</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Listado de Categorias</a></li>
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
                    <h4 class="card-title">Formulario de categorias</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                            <div class="alert text-white bg-danger" role="alert">
                                <div class="iq-alert-text">{{$error}}</div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                                </button>
                             </div>
                            @endforeach
                        </ul>
                @endif
                @if (isset($categoria))
                    <form action="{{ route('categorias.update', $categoria) }}" method="POST" >
                        @method('PATCH')
                @else
                    <form action="{{ route('categorias.store') }}" method="POST">
                @endif

                @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') ?? $categoria->nombre ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion') ?? $categoria->descripcion ?? '' }}"></input>
                    </div>
                    <input type="submit" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
@endsection

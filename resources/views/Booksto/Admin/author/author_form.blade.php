@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Autores</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('autores.index') }}">Autores</a></li>
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
                    <h4 class="card-title">Agregar autor</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="{{ route('autores.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image">
                            <label class="custom-file-label" for="image"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">País:</label>
                        <input type="text" class="form-control" name="country" id="country">
                    </div>
                    <input type="submit" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
@endsection

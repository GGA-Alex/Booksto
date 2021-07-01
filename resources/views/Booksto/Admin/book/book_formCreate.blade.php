<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Agregar Libro</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('libros.index') }}">Libros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agregar Libro</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Agregar Libro</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="{{ route('libros.store') }}" method="POST">

                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
                        <x-jet-input-error for="nombre" />
                    </div>
                    <div class=" form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" class="form-control" name="isbn" id="isbn" value="{{ old('isbn') }}">
                        <x-jet-input-error for="isbn" />
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria:</label>
                        <select class="form-control" name="category_id" id="category_id" value="{{ old('category_id') }}">
                            <option value="" selected disabled>Seleccione una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="category_id" />
                    </div>
                    <div class="form-group">
                        <label for="editorial_id">Editorial:</label>
                        <select class="form-control" name="editorial_id" id="editorial_id"
                            value="{{ old('editorial_id') }}">
                            <option value="" selected disabled>Seleccione una editorial</option>
                            @foreach ($editorials as $editorial)
                                <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="editorial_id" />
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea class="form-control" rows="4" name="descripcion" id="descripcion"
                            value="{{ old('descripcion') }}"></textarea>
                        <x-jet-input-error for="descripcion" />
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" step=".01" class="form-control" name="precio" id="precio"
                            value="{{ old('precio') }}" min="0">
                        <x-jet-input-error for="precio" />
                    </div>
                    <div class="form-group">
                        <label for="paginas">Paginas:</label>
                        <input type="number" class="form-control" name="paginas" id="paginas"
                            value="{{ old('paginas') }}" min="0">
                        <x-jet-input-error for="paginas" />
                    </div>
                    <div class="form-group">
                        <label for="año">Año de publicación:</label>
                        <input type="number" class="form-control" name="año" id="año" value="{{ old('año') }}"
                            min="1990" max="2021">
                        <x-jet-input-error for="año" />
                    </div>
                    <div class="form-group">
                        <label for="edicion">Edición:</label>
                        <input type="number" class="form-control" name="edicion" id="edicion"
                            value="{{ old('edicion') }}" min="1">
                        <x-jet-input-error for="edicion" />
                    </div>
                    <input type="submit" class="btn btn-dark" value="Guardar libro" />
                </form>
            </div>
        </div>
    </div>
@endsection

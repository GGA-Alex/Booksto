@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Detalles del Autor</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('autores.index') }}">Administrar autores</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $autore->nombre }}</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Detalles del autor: {{ $autore->nombre }}</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center ">
                    <a href="{{ route('autores.edit', $autore) }}" class="btn btn-warning text-white">
                        <i class="ri-pencil-line"></i>
                        Editar autor
                    </a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Id</th>
                                <th style="width: 5%;">Imagen</th>
                                <th style="width: 20%;">Nombre</th>
                                <th style="width: 20%;">País de origen</th>
                                <th style="width: 20%;">Libros publicados</th>
                                <th style="width: 10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $autore->id }}</td>
                                <td>
                                    @if ($autore->images->count())
                                        @foreach ($autore->images as $image)
                                            <img src="{{ Storage::url($image->url) }}" class="img-fluid rounded"
                                                alt="author-profile">
                                        @endforeach

                                    @else
                                        <img class="img-fluid avatar-50 rounded"
                                            src="{{ asset('bookstore/images/logo.png') }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $autore->nombre }}</td>
                                <td>
                                    {{ $autore->pais }}
                                </td>
                                <td>
                                    {{ $autore->books->count() }}

                                    @if ($autore->books->count())
                                        <br>
                                        <a href="{{ route('autores.libros', $autore) }}" class="btn btn-primary mt-2">
                                            Ver publicaciones
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        @if ($autore->books->count())
                                            <p class="bg-danger p-1">No se puede eliminar este autor</p>
                                        @else
                                            <form action="{{ route('autores.destroy', $autore) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span class="table-remove">
                                                    <button type="submit" class="btn bg-danger btn-rounded btn-sm my-0">
                                                        Eliminar Autor
                                                    </button>
                                                </span>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

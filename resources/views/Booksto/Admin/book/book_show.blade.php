@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Detalles Libro</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.index">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('libros.index') }}">Listado de libros</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $libro->nombre }}</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Detalles del libro: {{ $libro->nombre }}</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center ">
                    <a href="{{ route('libros.edit', $libro) }}" class="btn btn-warning text-white">
                        <i class="ri-pencil-line"></i>
                        Editar libro
                    </a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 3%;">Id</th>
                                <th style="width: 12%;">Imagen</th>
                                <th style="width: 15%;">Nombre</th>
                                <th style="width: 15%;">Categoria</th>
                                <th style="width: 15%;">Autor(es)</th>
                                <th style="width: 18%;">Descripción</th>
                                <th style="width: 7%;">Precio</th>
                                <th style="width: 15%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>
                                    @if ($libro->images->count())
                                        @foreach ($libro->images as $image)
                                            <img class="img-fluid rounded" src={{ Storage::url($image->url) }} alt="">
                                        @endforeach
                                    @else
                                        <img class="img-fluid rounded" src="{{ asset('bookstore/images/logo.png') }}"
                                            alt="">
                                    @endif
                                </td>
                                <td>{{ $libro->nombre }}</td>
                                <td>{{ $libro->category->nombre }}</td>
                                <td>
                                    @foreach ($libro->authors as $author)
                                        <p>{{ $author->nombre }}</p>
                                    @endforeach
                                </td>
                                <td>
                                    <p class="mb-0"> {{ $libro->descripcion }} </p>
                                </td>
                                <td>${{ $libro->precio }}</td>
                                <td>
                                    <form action="{{ route('libros.destroy', $libro) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <span class="table-remove">
                                            <button type="submit" class="btn bg-danger btn-rounded btn-sm my-0">
                                                Eliminar Libro
                                            </button>
                                        </span>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

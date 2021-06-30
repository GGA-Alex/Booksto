@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Autores</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('editoriales.index') }}">Administrar editoriales</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('editoriales.show', $editorial) }}">{{ $editorial->nombre }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Libros publicados</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Libros publicados</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 3%;">Id</th>
                                <th style="width: 12%;">Imagen</th>
                                <th style="width: 15%;">Nombre</th>
                                <th style="width: 18%;">Descripción</th>
                                <th style="width: 7%;">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($editorial->books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->nombre }}</td>
                                    <td>
                                        @switch($book->status)
                                            @case(1)
                                                <span class="badge badge-success">Publicado</span>
                                            @break
                                            @case(2)
                                                <span class="badge badge-danger">No publicado</span>
                                            @break
                                            @default

                                        @endswitch
                                    </td>
                                    <td>${{ $book->precio }}</td>
                                    <td>
                                        <a href="{{ route('libros.show', $book) }}" class="btn btn-primary">
                                            Ver detalles del libro
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

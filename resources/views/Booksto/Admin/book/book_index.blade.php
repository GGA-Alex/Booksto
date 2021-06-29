@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Libros</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Libros</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Lista de libros</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center ">
                    <a href="{{ route('libros.create') }}" class="btn btn-primary">Agregar nuevo libro</a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class=" data-tables table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 3%;">Id</th>
                                <th style="width: 15%;">Nombre</th>
                                <th style="width: 7%;">Estado</th>
                                <th style="width: 7%;">Precio</th>
                                <th style="width: 7%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
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
                                        <div class="flex align-items-center list-user-action">
                                            <a href="{{ route('libros.show', $book) }}" class="bg-primary"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Detalles">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('libros.edit', $book) }}" class="bg-warning"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Editar">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                        </div>
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

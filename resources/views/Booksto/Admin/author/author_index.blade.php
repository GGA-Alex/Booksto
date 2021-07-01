<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Autores</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('autores.index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Autores</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    @if (session('create'))
        <div class="alert text-white bg-primary w-full" role="alert">
            <div class="iq-alert-text">{{ session('create') }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ri-close-line"></i>
            </button>
        </div>
    @endif
    @if (session('update'))
        <div class="alert text-white bg-warning w-full" role="alert">
            <div class="iq-alert-text">{{ session('update') }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ri-close-line"></i>
            </button>
        </div>
    @endif
    @if (session('delete'))
        <div class="alert text-white bg-danger w-full" role="alert">
            <div class="iq-alert-text">{{ session('delete') }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ri-close-line"></i>
            </button>
        </div>
    @endif
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Lista de autores</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a href="{{ route('autores.create') }}" class="btn btn-primary">
                        Agregar un nuevo autor
                    </a>
                </div>
            </div>

            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 1%;">Id</th>
                                <th style="width: 1%;">Imagen</th>
                                <th style="width: 20%;">Nombre</th>
                                <th style="width: 10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>
                                        @if ($author->images->count())
                                            <img src="{{ Storage::url($author->images->first()->url) }}"
                                                class="img-fluid avatar-50 rounded" alt="author-profile">
                                        @else
                                            <img class="img-fluid avatar-50 rounded "
                                                src="{{ asset('bookstore/images/logo.png') }}" alt="">
                                        @endif

                                    </td>
                                    <td>{{ $author->nombre }}</td>
                                    <td>
                                        <a href="{{ route('autores.show', $author) }}" class="btn btn-primary mt-2">
                                            <i class="fa fa-eye"></i>
                                            Ver detalles
                                        </a>
                                        <a href="{{ route('autores.edit', $author) }}"
                                            class="btn btn-warning mt-2 text-white">
                                            <i class="ri-pencil-line"></i>
                                            Editar autor
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

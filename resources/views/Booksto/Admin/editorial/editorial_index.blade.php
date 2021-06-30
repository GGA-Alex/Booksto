<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Editoriales</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listado de Editoriales</li>
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
                    <h4 class="card-title">Lista de editoriales</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a href="{{ route('editoriales.create') }}" class="btn btn-primary">Agregar nueva editorial</a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="10%">Nombre</th>
                                <th width="10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($editoriales as $editorial)
                                <tr>
                                    <td>{{ $editorial->id }}</td>
                                    <td>{{ $editorial->nombre }}</td>
                                    <td>
                                        <a href="{{ route('editoriales.show', $editorial) }}"
                                            class="btn btn-primary mt-2">
                                            <i class="fa fa-eye"></i>
                                            Ver detalles
                                        </a>
                                        <a href="{{ route('editoriales.edit', $editorial) }}"
                                            class="btn btn-warning mt-2 text-white">
                                            <i class="ri-pencil-line"></i>
                                            Editar editorial
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

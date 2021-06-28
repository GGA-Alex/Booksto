@extends('layouts\Booksto - Layouts\bookstoForm')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Categorias</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listado de Categorias</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Lista de categorias</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar nueva categoria</a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="20%">Nombre</th>
                                <th width="65%">Descripción</th>
                                <th width="10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->descripcion }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            
                                            <a href="{{ route('categorias.show', $categoria) }}" class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalles">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('categorias.edit', $categoria) }}" class="bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
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

@extends('layouts\Booksto - Layouts\bookstoForm')

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
                                <th width="10%">Ciudad</th>
                                <th width="10%">Direccion</th>
                                <th width="10%">Telefono</th>
                                <th width="10%">email</th>
                                <th width="10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($editoriales as $editorial)
                                <tr>
                                    <td>{{ $editorial->id }}</td>
                                    <td>{{ $editorial->nombre }}</td>
                                    <td>{{ $editorial->ciudad }}</td>
                                    <td>{{ $editorial->direccion }}</td>
                                    <td>{{ $editorial->telefono }}</td>
                                    <td>{{ $editorial->email }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            
                                            <a href="{{ route('editoriales.show', $editorial) }}" class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalles">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('editoriales.edit', $editorial) }}" class="bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
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

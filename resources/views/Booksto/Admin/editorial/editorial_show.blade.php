@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Editoriales</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('editoriales.index') }}">Listado de Editoriales</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $editoriale->nombre }}</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" style="width:100%">
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
                            <tr>
                                <td>{{ $editoriale->id }}</td>
                                <td>{{ $editoriale->nombre }}</td>
                                <td>{{ $editoriale->ciudad }}</td>
                                <td>{{ $editoriale->direccion }}</td>
                                <td>{{ $editoriale->telefono }}</td>
                                <td>{{ $editoriale->email }}</td>
                                <td>
                                    <form action="{{ route('editoriales.destroy', $editoriale) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <span class="table-remove">
                                            <button type="submit" class="btn iq-bg-danger btn-rounded btn-sm my-0">Eliminar
                                                editorial</button>
                                        </span>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </>
            </div>
        </div>
    @endsection

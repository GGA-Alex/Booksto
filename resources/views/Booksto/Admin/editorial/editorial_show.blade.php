@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Detalles Editorial</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('editoriales.index') }}">Listado de Editoriales</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $editoriale->nombre }}</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Detalles de la editorial: {{ $editoriale->nombre }}</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center ">
                    <a href="{{ route('editoriales.edit', $editoriale) }}" class="btn btn-warning text-white">
                        <i class="ri-pencil-line"></i>
                        Editar editorial
                    </a>
                </div>
            </div>
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
                                <th width="10%">Libros almacenados</th>
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
                                    {{ $editoriale->books->count() }}

                                    @if ($editoriale->books->count())
                                        <br>
                                        <a href="{{ route('editoriales.libros', $editoriale) }}"
                                            class="btn btn-primary mt-2">
                                            Ver libros
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($editoriale->books->count())
                                        <p class="bg-danger p-1">No se puede eliminar esta editorial</p>
                                    @else
                                        <form action="{{ route('editoriales.destroy', $editoriale) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <span class="table-remove">
                                                <button type="submit" class="btn bg-danger btn-rounded btn-sm my-0">
                                                    Eliminar editorial
                                                </button>
                                            </span>
                                        </form>
                                    @endif


                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </>
            </div>
        </div>
    @endsection

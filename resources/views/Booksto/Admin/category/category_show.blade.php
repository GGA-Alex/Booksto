@extends('layouts\Booksto - Layouts\bookstoForm')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Categorias</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Listado de Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$categoria->nombre}}</li>
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
                                <th width="20%">Nombre</th>
                                <th width="65%">Descripción</th>
                                <th width="10%">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                </td>
                                <td>{{ $categoria->descripcion }}</td>
                                </td>
                                <td>
                                    <form action="{{route('categorias.destroy',$categoria)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <span class="table-remove">
                                            <button type="submit" class="btn iq-bg-danger btn-rounded btn-sm my-0">Eliminar Categoria</button>
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

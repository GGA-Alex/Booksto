@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Autores</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Autores</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Lista de autores</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a href="{{ route('autores.create') }}" class="btn btn-primary">Agregar un nuevo autor</a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Id</th>
                                <th style="width: 5%;">Imagen</th>
                                <th style="width: 20%;">Nombre</th>
                                <th style="width: 20%;">País</th>
                                <th style="width: 10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>
                                        <img src="{{ Storage::url($author->image) }}" class="img-fluid avatar-50 rounded"
                                            alt="author-profile">
                                    </td>
                                    <td>{{ $author->name }}</td>
                                    <td>
                                        {{ $author->country }}
                                    </td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Detalles" href="{{route('autores.show',$author)}}"><i
                                                    class="ri-pencil-line"></i></a>
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Edit" href="admin-add-category.html"><i
                                                    class="ri-pencil-line"></i></a>
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
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

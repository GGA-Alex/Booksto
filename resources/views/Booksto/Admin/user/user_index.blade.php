<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Usuarios</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de usuarios</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    @if (session('update'))
        <div class="alert text-white bg-warning w-full" role="alert">
            <div class="iq-alert-text">{{ session('update') }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ri-close-line"></i>
            </button>
        </div>
    @endif
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Lista de usuarios</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Id</th>
                                <th style="width: 5%;">Nombre</th>
                                <th style="width: 10%;">Correo electronico</th>
                                <th style="width: 5%;">Rol</th>
                                <th style="width: 10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>

                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <b>{{ $user->tipo }}</b>
                                    </td>
                                    <td>
                                        @if (auth()->user()->id == $user->id)
                                            <p class="bg-danger p-2 text-white">
                                                No puede cambiarle el rol a este usuario
                                            </p>
                                        @else
                                            <a href="{{ route('usuarios.edit', $user) }}"
                                                class="btn btn-warning mt-2 text-white">
                                                <i class="ri-pencil-line"></i>
                                                Cambiar rol usuario
                                            </a>
                                        @endif
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

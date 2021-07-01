<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Ordenes</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Ordenes</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Lista de ordenes</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Id orden</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case(1)
                                                <div class="badge badge-pill badge-danger">Pendiente</div>
                                            @break
                                            @case(2)
                                                <div class="badge badge-pill badge-dark">Pago recibido</div>
                                            @break
                                            @case(3)
                                                <div class="badge badge-pill badge-warning">Enviado</div>
                                            @break
                                            @case(4)
                                                <div class="badge badge-pill badge-info">Entregado</div>
                                            @break
                                            @case(5)
                                                <div class="badge badge-pill badge-primary">Anulado</div>
                                            @break
                                            @default
                                        @endswitch

                                    </td>
                                    <td>
                                        <a href="{{ route('ordenes-usuario.edit', $order) }}"
                                            class="btn btn-primary mt-2">
                                            <i class="fa fa-eye"></i>
                                            Ver detalles de la orden
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

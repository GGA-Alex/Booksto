<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Ordenes</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ordenes-usuario.index') }}">Lista de Ordenes</a></li>
                <li class="breadcrumb-item active" aria-current="page">ID-orden : {{ $ordenes_usuario->id }}</li>
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
                    <h4 class="card-title">Administrar orden</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @livewire('status-order', ['ordenes_usuario' => $ordenes_usuario], key($ordenes_usuario->id))
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Datos basicos de la orden</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha de la orden</th>
                                        <th scope="col">Nombre del comprador</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">ID-ordern</th>
                                        <th scope="col">Dirección de envio</th>
                                        <th scope="col">Datos de contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $ordenes_usuario->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $ordenes_usuario->user->name }}</td>
                                        <td>
                                            @switch($ordenes_usuario->status)
                                                @case(1)
                                                    <span class="badge badge-danger">
                                                        Pendiente de pago
                                                    </span>
                                                @break
                                                @case(2)
                                                    <span class="badge badge-dark">
                                                        Pago recibido
                                                    </span>
                                                @break
                                                @case(3)
                                                    <span class="badge badge-warning">
                                                        Pedido enviado
                                                    </span>
                                                @break
                                                @case(4)
                                                    <span class="badge badge-info">
                                                        Pedido entregado
                                                    </span>
                                                @break
                                                @case(5)
                                                    <span class="badge badge-primary">
                                                        Pedido anulado
                                                    </span>
                                                @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td>{{ $ordenes_usuario->id }}</td>
                                        <td>
                                            <p class="mb-0">
                                                {{ $ordenes_usuario->address }}
                                            </p>
                                            <p class="mb-0">
                                                {{ $ordenes_usuario->state->name }} -
                                                {{ $ordenes_usuario->municipality->name }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="mb-0">
                                                Nombre: {{ $ordenes_usuario->contact }}
                                            </p>
                                            <p class="mb-0">
                                                Telefono: {{ $ordenes_usuario->phone }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Detalles de la orden</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive-sm">
                            <div class="table-responsive-sm">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col">Precio</th>
                                            <th class="text-center" scope="col">Cantidad</th>
                                            <th class="text-center" scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>
                                                    <div class="flex">
                                                        <img class="w-12 h-15 object-cover mr-4"
                                                            src="{{ $item->options->image }}" alt="">
                                                        <p class="font-bold">
                                                            {{ $item->name }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="text-center">${{ $item->price }}</td>
                                                <td class="text-center">{{ $item->qty }}</td>
                                                <td class="text-center"><b>${{ $item->price * $item->qty }}</b></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-bold">Total: ${{ $ordenes_usuario->total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

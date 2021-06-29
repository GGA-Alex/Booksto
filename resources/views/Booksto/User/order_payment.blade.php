@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Compra</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de compra</li>
                <li class="breadcrumb-item active" aria-current="page">Dirección de envio</li>
                <li class="breadcrumb-item active" aria-current="page">Pago</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('bookstore/images/logo.png') }}" class="img-fluid avatar-100" alt="">
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <h4 class="mb-0 float-right">Recibo</h4>
                    </div>
                    <div class="col-sm-12">
                        <hr class="mt-3">
                        <h5 class="mb-0">Hola, {{ auth()->user()->name }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Status</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Direccion de envio</th>
                                        <th scope="col">Datos de contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="badge badge-danger">
                                                Pendiente de pago
                                            </span>
                                        </td>
                                        <td>{{ $orden->id }}</td>

                                        <td>
                                            <p class="mb-0">
                                                {{ $orden->address }}
                                            </p>
                                            <p class="mb-0">
                                                {{ $orden->state->name }} - {{ $orden->municipality->name }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="mb-0">
                                                Nombre: {{ $orden->contact }}
                                            </p>
                                            <p class="mb-0">
                                                Telefono: {{ $orden->phone }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Resumen:</h5>
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
                                        <td class="font-bold">Total: ${{ $orden->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6 text-right">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

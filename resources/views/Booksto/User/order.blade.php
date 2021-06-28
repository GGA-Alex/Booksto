@extends('layouts\Booksto - Layouts\bookstoCart')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Compra</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compra</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <form>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <h5 class="mt-4 mb-4">Información de contacto:</h5>
                <div class="form-group">
                    <label for="name">Nombre de contacto:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="tel">Telefono de contacto:</label>
                    <input type="text" class="form-control" id="tel">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <h5 class="mt-4 mb-4">Envio:</h5>
                <div class="form-group">
                    <label for="states">Estado:</label>
                    <select class="form-control form-control-lg" name="states" id="states">
                        <option value="" disabled selected>Seleccione un Estado</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="states">Municipio:</label>
                    <select class="form-control form-control-lg" name="states" id="states">
                        <option value="" disabled selected>Seleccione un Municipio</option>
                        @foreach ($municipialities as $munipiality)
                            <option value="{{ $munipiality->id }}">{{ $munipiality->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Dirección:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="name">Referencia:</label>
                    <input type="text" class="form-control" id="name">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive-sm">
                    <h5 class="mt-4 mb-4">Detalle del pedido</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th class="text-center" scope="col">Cantidad</th>
                                <th class="text-center" scope="col">Precio</th>
                                <th class="text-center" scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td>
                                        <h6 class="mb-0">
                                            {{ $item->name }}
                                        </h6>
                                    </td>
                                    <td class="row d-flex justify-content-center">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="text-center">
                                        ${{ $item->price }}
                                    </td>
                                    <td class="text-center">
                                        <b>
                                            ${{ $item->price * $item->qty }}
                                        </b>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="iq-card-body">
                        <h4 class="card-title">Total: ${{ Cart::subTotal() }}</h4>
                        <h4 class="card-title">Envio: GRATIS</h4>
                        <hr>

                        <a href="{{ route('ordenes.crear') }}" class="btn btn-dark text-white mt-3">
                            Continuar con la compra
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

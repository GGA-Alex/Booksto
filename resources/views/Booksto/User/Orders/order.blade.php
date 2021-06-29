@extends('layouts\Booksto - Layouts\bookstoCart')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Compra</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shopping-cart') }}">Detalles de compra</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dirección de envio</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    @livewire('create-order')
@endsection

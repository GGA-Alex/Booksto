@extends('layouts\Booksto - Layouts\bookstoCart')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Carrito de compra</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrito de compras</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    @livewire('shopping-cart')
@endsection

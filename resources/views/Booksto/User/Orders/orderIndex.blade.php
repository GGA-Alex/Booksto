@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Ordenes</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mis pedidos</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <a href="{{ route('orden.index') . '?status=1' }}" class="col">
        <div class="iq-card text-white bg-danger iq-mb-3">
            <div class="iq-card-body text-center">
                <h4 class="card-title text-white">PENDIENTE</h4>
                <blockquote class="blockquote mb-0">
                    <h3 class="text-white">
                        {{ $pendiente }}
                    </h3>
                    <h3 class="text-white">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </h3>
                </blockquote>
            </div>
        </div>
    </a>
    <a href="{{ route('orden.index') . '?status=2' }}" class="col">
        <div class="iq-card text-white bg-dark iq-mb-3">
            <div class="iq-card-body text-center">
                <h4 class="card-title text-white">RECIBIDO</h4>
                <blockquote class="blockquote mb-0">
                    <h3 class="text-white">
                        {{ $recibido }}
                    </h3>
                    <h3 class="text-white">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </h3>
                </blockquote>
            </div>
        </div>
    </a>
    <a href="{{ route('orden.index') . '?status=3' }}" class="col">
        <div class="iq-card text-white bg-warning iq-mb-3">
            <div class="iq-card-body text-center">
                <h4 class="card-title text-white">ENVIADO</h4>
                <blockquote class="blockquote mb-0">
                    <h3 class="text-white">
                        {{ $enviado }}
                    </h3>
                    <h3 class="text-white">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </h3>
                </blockquote>
            </div>
        </div>
    </a>
    <a href="{{ route('orden.index') . '?status=4' }}" class="col">
        <div class="iq-card text-white bg-info iq-mb-3">
            <div class="iq-card-body text-center">
                <h4 class="card-title text-white">ENTREGADO</h4>
                <blockquote class="blockquote mb-0">
                    <h3 class="text-white">
                        {{ $entregado }}
                    </h3>
                    <h3 class="text-white">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                    </h3>
                </blockquote>
            </div>
        </div>
    </a>
    <a href="{{ route('orden.index') . '?status=5' }}" class="col">
        <div class="iq-card text-white bg-primary iq-mb-3">
            <div class="iq-card-body text-center">
                <h4 class="card-title text-white">ANULADO</h4>
                <blockquote class="blockquote mb-0">
                    <h3 class="text-white">
                        {{ $anulado }}
                    </h3>
                    <h3 class="text-white">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </h3>
                </blockquote>
            </div>
        </div>
    </a>
    <div class="iq-card w-full">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Ordenes</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <ul class="iq-timeline">
                @foreach ($orders as $order)
                    <li>
                        @switch($order->status)
                            @case(1)
                                <div class="timeline-dots border-danger">
                                    <i class="fa fa-clock-o text-danger" aria-hidden="true"></i>
                                </div>
                            @break
                            @case(2)
                                <div class="timeline-dots border-dark">
                                    <i class="fa fa-credit-card-alt text-dark" aria-hidden="true"></i>
                                </div>
                            @break
                            @case(3)
                                <div class="timeline-dots border-warning">
                                    <i class="fa fa-truck text-warning" aria-hidden="true"></i>
                                </div>
                            @break
                            @case(4)
                                <div class="timeline-dots border-info">
                                    <i class="fa fa-check-circle text-info" aria-hidden="true"></i>
                                </div>
                            @break
                            @case(5)
                                <div class="timeline-dots border-primary">
                                    <i class="fa fa-times-circle text-primary" aria-hidden="true"></i>
                                </div>
                            @break
                            @default

                        @endswitch
                        <h6 class="float-left mb-1">Orden-ID: {{ $order->id }}</h6>
                        <a href="{{ route('orden.show', $order) }}">
                            <span class="float-right mt-1">
                                <span>
                                    Ver detalles de la orden..
                                </span>
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </span>
                        </a>
                        <div class="d-inline-block w-100">
                            <p>{{ $order->created_at->format('d/m/Y') }}</p>
                            <p>
                                @switch($order->status)
                                    @case(1)
                                        Pendiente
                                    @break
                                    @case(2)
                                        Pago Recibido
                                    @break
                                    @case(3)
                                        Enviado
                                    @break
                                    @case(4)
                                        Entregado
                                    @break
                                    @case(5)
                                        Anulado
                                    @break
                                    @default
                                @endswitch
                            </p>

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

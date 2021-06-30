@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Dashboard</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inicio</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-line"></i></div>
                    <div class="text-left ml-3">
                        <h2 class="mb-0"><span class="counter">{{ $booksPublished }}</span></h2>
                        <h5 class="">Libros publicados</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-book-line"></i></div>
                    <div class="text-left ml-3">
                        <h2 class="mb-0"><span class="counter">{{ $booksNotPublished }}</span></h2>
                        <h5 class="">Libros no publicados</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-bookmark-fill"></i></div>
                    <div class="text-left ml-3">
                        <h2 class="mb-0"><span class="counter">{{ $users }}</h2>
                        <h5 class="">Usuarios</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                    <div class="text-left ml-3">
                        <h2 class="mb-0"><span class="counter">{{ $editorials }}</span></h2>
                        <h5 class="">Editoriales</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                    <div class="text-left ml-3">
                        <h2 class="mb-0"><span class="counter">{{ $categories }}</span></h2>
                        <h5 class="">Categorias</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Ordenes abiertas</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table mb-0 table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Id orden</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>

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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

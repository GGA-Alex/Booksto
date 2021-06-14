@extends('layouts\Booksto - Layouts\booksto')


@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Detalles libro</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $book->name }}</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Descripción del libro</h4>
            </div>
            <div class="iq-card-body pb-0">
                <div class="description-contens align-items-top row">
                    <div class="col-md-6">
                        <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body p-0">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <ul id="description-slider-nav"
                                            class="list-inline p-0 m-0  d-flex align-items-center">
                                            @foreach ($book->images as $image)
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <img src="{{ Storage::url($image->url) }}"
                                                            class="img-fluid rounded w-100" alt="">
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-9">
                                        <ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                                            @foreach ($book->images as $image)
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <img src="{{ Storage::url($image->url) }}"
                                                            class="img-fluid w-100 rounded" alt="">
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body p-0">
                                <h3 class="mb-3">{{ $book->name }}</h3>
                                <div class="price d-flex align-items-center font-weight-500 mb-2">
                                    <span class="font-size-24 text-dark">${{ $book->price }}</span>
                                </div>
                                <div class="mb-3 d-block">
                                    <span class="font-size-20 text-warning">
                                        <i class="fa fa-star mr-1"></i>
                                        <i class="fa fa-star mr-1"></i>
                                        <i class="fa fa-star mr-1"></i>
                                        <i class="fa fa-star mr-1"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                                <span class="text-dark mb-4 pb-4 iq-border-bottom d-block">{{ $book->description }}</span>

                                <div class="text-primary mb-4">ISBN:
                                    <span class="text-body">{{ $book->isbn }}</span>
                                </div>
                                <div class="text-primary mb-4">Edición:
                                    <span class="text-body">{{ $book->edition }}</span>
                                </div>
                                <div class="text-primary mb-4">Año de publicación:
                                    <span class="text-body">{{ $book->year }}</span>
                                </div>
                                <div class="text-primary mb-4">Páginas:
                                    <span class="text-body">{{ $book->pages }}</span>
                                </div>
                                <div class="text-primary mb-4">Autor(es):
                                    @foreach ($book->authors as $author)
                                        <br><span class="text-body">{{ $author->name }}</span>
                                    @endforeach
                                </div>
                                <div class="mb-4 d-flex align-items-center">
                                    <a href="#" class="btn btn-primary view-more mr-2">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

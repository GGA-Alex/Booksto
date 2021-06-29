@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Tienda</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagina de Inicio</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
            <div class="newrealease-contens">
                <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                    @foreach ($books as $book)
                        @if ($book->images->count())
                            <li class="item">
                                <img src="{{ Storage::url($book->images->first()->url) }}" class="img-fluid w-100 rounded"
                                    alt="">
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                <div class="iq-header-title">
                    <h4 class="card-title mb-0">Recomendaciones</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a href="{{ route('CategoryPage') }}" class="btn btn-sm btn-primary view-more">Ver mas</a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                <div class="iq-card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 p-0 position-relative image-overlap-shadow">
                                            <a href="javascript:void();">
                                                @if ($book->images->count())
                                                    <img class="img-fluid rounded w-100"
                                                        src="{{ Storage::url($book->images->first()->url) }}" alt="">
                                                @endif
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ route('books.show', $book) }}"
                                                    class="btn btn-sm btn-white">Ver libro</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <h6 class="mb-1">{{ $book->nombre }}</h6>
                                                @foreach ($book->authors as $author)
                                                    <p class="font-size-13 line-height mb-1">
                                                        {{ $author->nombre }}
                                                    </p>
                                                @endforeach
                                                <div class="d-block line-height">
                                                    <span class="font-size-11 text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="price d-flex align-items-center">
                                                <h6><b>${{ $book->precio }}</b></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between mb-0">
                <div class="iq-header-title">
                    <h4 class="card-title">Libro Recomendado</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="row align-items-center">
                    <div class="col-sm-5 pr-0">
                        <a href="javascript:void();">
                            <img class="img-fluid rounded w-100"
                                src="{{ Storage::url($books->first()->images->first()->url) }}" alt=""></a>
                    </div>
                    <div class="col-sm-7 mt-3 mt-sm-0">
                        <h4 class="mb-2">{{ $books->first()->nombre }}</h4>
                        @foreach ($books->first()->authors as $author)
                            <p class="mb-2">{{ $author->nombre }}</p>
                        @endforeach
                        <div class="mb-2 d-block">
                            <span class="font-size-12 text-warning">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </span>
                        </div>
                        <span class="text-dark mb-3 d-block">{{ $books->first()->description }}</span>
                        <a href="{{ route('books.show', $books->first()) }}" class="btn btn-primary learn-more">
                            Ver detalles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between mb-0">
                <div class="iq-header-title">
                    <h4 class="card-title">Nuestros Autores</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <ul class="list-inline row mb-0 align-items-center iq-scrollable-block">
                    @foreach ($authors as $author)
                        <li class="col-sm-6 d-flex mb-3 align-items-center">
                            <div class="icon iq-icon-box mr-3">
                                <a href="javascript:void();">
                                    <img class="img-fluid avatar-60 rounded-circle"
                                        src="{{ Storage::url($author->imagen) }}" alt=""></a>
                            </div>
                            <div class="mt-1">
                                <h6>{{ $author->nombre }}</h6>
                                <p class="mb-0 text-primary">Libros publicados: <span
                                        class="text-body">{{ $author->books->count() }}</span></p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

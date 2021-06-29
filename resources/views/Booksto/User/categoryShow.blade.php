@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Categorias</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('CategoryPage') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $categoria->nombre }}</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="iq-card-transparent mb-0">
            <div class="d-block text-center">
                <h2 class="mb-3">{{ $categoria->nombre }}</h2>
            </div>
        </div>
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="row">
                    @foreach ($categoria->books as $book)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                <div class="iq-card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 p-0 position-relative image-overlap-shadow">
                                            @if ($book->images->count())
                                                <img class="img-fluid rounded w-100"
                                                    src="{{ Storage::url($book->images->first()->url) }}" alt="">
                                            @endif
                                            <div class="view-book">
                                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-white">
                                                    Ver libro
                                                </a>
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

@endsection

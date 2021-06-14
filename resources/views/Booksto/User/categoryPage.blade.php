@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Categorias</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="iq-card-transparent mb-0">
            <div class="d-block text-center">
                <h2 class="mb-3">¿Que libro buscas?</h2>
                <div class="w-100 iq-search-filter">
                    <ul class="list-inline p-0 m-0 row justify-content-center search-menu-options">
                        <li class="search-menu-opt">
                            <div class="iq-dropdown">
                                <div class="form-group mb-0">
                                    <select class="form-control form-search-control bg-white border-0"
                                        id="exampleFormControlSelect1">
                                        <option selected="">Selecciona una categoría</option>
                                        @foreach ($categories as $category)
                                            <option id="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="search-menu-opt">
                            <div class="iq-search-bar search-book d-flex align-items-center">
                                <form action="#" class="searchbox">
                                    <input type="text" class="text search-input" placeholder="buscar...">
                                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                </form>
                                <button type="submit" class="btn btn-primary search-data ml-2">Buscar libro</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="row">
                    @foreach ($categories->first()->books as $book)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                <div class="iq-card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 p-0 position-relative image-overlap-shadow">
                                            <a href="javascript:void();">
                                                <img class="img-fluid rounded w-100"
                                                    src="{{ Storage::url($book->images->first()->url) }}" alt="">
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ route('books.show', $book) }}"
                                                    class="btn btn-sm btn-white">Ver
                                                    detalles</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <h6 class="mb-1">{{ $book->name }}</h6>
                                                @foreach ($book->authors as $author)
                                                    <p class="font-size-13 line-height mb-1">
                                                        {{ $author->name }}
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
                                                <h6><b>${{ $book->price }}</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="javascript:void();"><i
                                                        class="ri-shopping-cart-2-fill text-primary"></i></a>
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

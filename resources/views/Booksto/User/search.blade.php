@extends('layouts\Booksto - Layouts\booksto')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Resultados de busqueda</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buscar</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <ul>
        @forelse ($books as $book)
            <li class="bg-white rounded-lg shadow mb-4">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img class="h-48 w-full object-cover object-center"
                                src="{{ Storage::url($book->images->first()->url) }}" class="card-img" alt="#">
                        </div>
                        <div class="col-md-8">
                            <div class="iq-card-body">
                                <h4 class="card-title">{{ $book->nombre }}</h4>
                                <p class="card-text">Categoria: {{ $book->category->nombre }}</p>
                                <p class="card-text"><small class="text-muted">$ {{ $book->precio }}</small></p>
                                <a class="btn btn-danger mb-3" href="{{ route('books.show', $book) }}">Más
                                    información</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        @empty
            <li class="bg-white rounded-lg shadow mb-4">
                <div class="iq-card iq-card-block iq-card-height iq-mb-3">
                    <div class="iq-card-body">
                        <h4 class="card-title">Ningun libro coincide con su busqueda.</h4>
                    </div>
                </div>
            </li>
        @endforelse
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </ul>

@endsection

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
                <h2 class="mb-3">Busca tu libro favorito</h2>
            </div>
        </div>
        <section>
            @foreach ($categories as $category)
                <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center mb-2">
                        <h1 class="text-lg uppercase font-semibold">{{ $category->nombre }}</h1>
                        <a class="ml-2 font-semibold hover:underline" href="{{ route('categoria.show', $category) }}">
                            Ver mas...
                        </a>
                    </div>
                    @livewire('category-books', ['category' => $category])
                </div>
            @endforeach
        </section>

        @push('script')
            <script>
                Livewire.on('glider', function(id) {
                    new Glider(document.querySelector('.glider-' + id), {
                        slidesToScroll: 1,
                        slidesToShow: 1,
                        draggable: true,
                        dots: '.glider-' + id + '~ .dots',
                        arrows: {
                            prev: '.glider-' + id + '~ .glider-prev',
                            next: '.glider-' + id + '~ .glider-next'
                        },
                        responsive: [{
                                breakpoint: 640,
                                settings: {
                                    slidesToScroll: 2.5,
                                    slidesToShow: 2,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToScroll: 3.5,
                                    slidesToShow: 3,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToScroll: 4.5,
                                    slidesToShow: 4,
                                }
                            },
                            {
                                breakpoint: 1280,
                                settings: {
                                    slidesToScroll: 5.5,
                                    slidesToShow: 5,
                                }
                            }
                        ]
                    });
                });
            </script>
        @endpush
    </div>
@endsection

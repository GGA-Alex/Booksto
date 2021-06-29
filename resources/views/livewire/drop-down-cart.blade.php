<div>
    <ul class="navbar-nav ml-auto navbar-list">

        <li class="nav-item nav-icon dropdown">
            <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                <i class="ri-shopping-cart-2-line"></i>
                <span class="badge badge-danger count-cart rounded-circle">{{ Cart::count() }}</span>
            </a>
            <div class="iq-sub-dropdown">
                <div class="iq-card shadow-none m-0">
                    <div class="iq-card-body p-0 toggle-cart-info">
                        <div class="bg-primary p-3">
                            <h5 class="mb-0 text-white">
                                Carrito
                                <small class="badge  badge-light float-right pt-1">{{ Cart::count() }}</small>
                            </h5>
                        </div>
                        @forelse (Cart::content() as $item)
                            <a class="iq-sub-card">
                                <div class="media align-items-center border-bottom pb-2">
                                    <div class="">
                                        <img class="rounded" src="{{ $item->options->image }}" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">{{ $item->name }}</h6>
                                        <p class="mb-0">Cantidad: {{ $item->qty }}</p>
                                        <p class="mb-0">$ {{ $item->price }}</p>

                                    </div>
                                </div>
                            </a>
                        @empty
                            <a class="iq-sub-card">
                                <div class="media align-items-center">
                                    <h6 class="m-2 ">Vacio..</h6>
                                </div>
                            </a>

                        @endforelse

                        @if (Cart::count())
                            <div class="d-flex align-items-center text-center p-3">
                                <p class="mb-0 ">Total: {{ Cart::subtotal() }}</p>
                            </div>
                            <div class="d-flex align-items-center text-center p-3">
                                <a class="btn btn-primary iq-sign-btn d-block" href="{{ route('shopping-cart') }}"
                                    role="button">
                                    Ir al carrito de compras
                                </a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </li>
    </ul>

</div>

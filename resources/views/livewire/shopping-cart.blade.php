<div>
    @if (Cart::count())
        <div class="row align-item-center">
            <div class="col-lg-8">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                        <div class="iq-header-title">
                            <h4 class="card-title">Carrito de compras</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="list-inline p-0 m-0">
                            @foreach (Cart::content() as $item)
                                <li class="checkout-product">
                                    <div class="row align-items-center">
                                        <div class="col-sm-2">
                                            <img class="img-fluid rounded" src="{{ $item->options->image }}" alt="">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkout-product-details">
                                                <h5>{{ $item->name }}</h5>
                                                <div class="price">
                                                    <h5>${{ $item->price }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="row align-items-center mt-2">
                                                        <div class="col-sm-7 col-md-6">
                                                            @livewire('update-cart-item', ['rowId' => $item->rowId],
                                                            key($item->rowId))
                                                        </div>
                                                        <div class="col-sm-5 col-md-6">
                                                            <span
                                                                class="product-price">${{ $item->price * $item->qty }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="text-dark font-size-20"
                                                        wire:click="delete('{{ $item->rowId }}')"
                                                        wire:target="delete('{{ $item->rowId }}')">
                                                        <i class="ri-delete-bin-7-fill"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <p><b>Detalles de compra</b></p>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Total de productos</span>
                            <span>{{ Cart::count() }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="text-dark"><strong>Total</strong></span>
                            <span class="text-dark"><strong>${{ Cart::subTotal() }}</strong></span>
                        </div>
                        <a class="btn btn-danger d-block mt-3 text-white" wire:click="destroy">
                            <i class="las la-trash"></i>
                            Borrar Carrito
                        </a>
                        <a id="place-order" href="{{ route('orden.crear') }}" class="btn btn-primary d-block mt-3">
                            Continuar con la compra
                        </a>
                    </div>
                </div>
                <div class="iq-card ">
                    <div class="card-body iq-card-body p-0 iq-checkout-policy">
                        <ul class="p-0 m-0">
                            <li class="d-flex align-items-center">
                                <div class="iq-checkout-icon">
                                    <i class="ri-checkbox-line"></i>
                                </div>
                                <h6>Politica de seguridad (Pago seguro.)</h6>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="iq-checkout-icon">
                                    <i class="ri-truck-line"></i>
                                </div>
                                <h6>Politica de envio (Envio a casa.)</h6>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="iq-checkout-icon">
                                    <i class="ri-arrow-go-back-line"></i>
                                </div>
                                <h6>Politica de retornos (Facil retorno.)</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <a href="{{ route('HomePage') }}" class="btn btn-primary text-white">Ir a inicio</a>
    @endif
</div>

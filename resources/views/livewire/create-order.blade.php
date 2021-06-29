<div>

    <div class="row align-item-center">
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre completo:</label>
                                <input type="text" class="form-control" name="nombre"
                                    placeholder="Nombre de la persona que recibira el pedido."
                                    wire:model.defer="contact">
                                <x-jet-input-error for="contact" />
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="telefono">Telefono de contacto:</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="Ingrese un numero de contacto." wire:model.defer="phone">
                                <x-jet-input-error for="phone" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" name="estado" id="estado" wire:model="state_id">
                                    <option value="" disabled selected>Seleccione un Estado</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="state_id" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="municipio">Municipio:</label>
                                <select class="form-control" name="municipio" id="municipio"
                                    wire:model="municipality_id">
                                    <option value="" disabled selected>Seleccione un Municipio</option>
                                    @foreach ($municipalities as $municipality)
                                        <option value="{{ $municipality->id }}">{{ $municipality->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="municipality_id" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    wire:model="address">
                                <x-jet-input-error for="address" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="referencia">Referencia:</label>
                                <input type="text" class="form-control" name="referencia" id="referencia"
                                    wire:model="reference">
                                <x-jet-input-error for="reference" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button id="savenddeliver" type="submit" class="btn btn-primary" wire:click="create_order"
                                wire:loading.attr="disabled" wire:target="create_order">
                                Continuar con la compra
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="list-inline p-0 m-0">
                        @foreach (Cart::content() as $item)
                            <li class="checkout-product">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <img class="img-fluid rounded" src="{{ $item->options->image }}" alt="">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkout-product-details font-size-10">
                                            <h5>{{ $item->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="row align-items-center mt-2">
                                                    <div class="col-sm-7 col-md-6">
                                                        Cant: {{ $item->qty }}
                                                    </div>
                                                    <div class="col-sm-5 col-md-6">
                                                        <span
                                                            class="product-price">${{ $item->price * $item->qty }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                    <p><b>Detalles de compra</b></p>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Total de productos</span>
                        <span>{{ Cart::count() }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Cargos de envio</span>
                        <span class="text-success">GRATIS</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="text-dark"><strong>Total</strong></span>
                        <span class="text-dark"><strong>${{ Cart::subTotal() }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

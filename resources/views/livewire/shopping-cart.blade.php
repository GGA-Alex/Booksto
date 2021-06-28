<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th class="text-center" scope="col">Cantidad</th>
                            <th class="text-center" scope="col">Precio</th>
                            <th class="text-center" scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td>
                                    <h6 class="mb-0">
                                        {{ $item->name }}
                                    </h6>
                                </td>
                                <td class="row d-flex justify-content-center">
                                    @livewire('update-cart-item', ['rowId' => $item->rowId],
                                    key($item->rowId))
                                </td>
                                <td class="text-center">
                                    ${{ $item->price }}
                                    <a wire:click="delete('{{ $item->rowId }}')"
                                        wire:target="delete('{{ $item->rowId }}')">
                                        <i class="las la-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <b>
                                        ${{ $item->price * $item->qty }}
                                    </b>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            @if (Cart::count())
                <div class="iq-card-body">
                    <h4 class="card-title">Total: ${{ Cart::subTotal() }}</h4>
                </div>
                <a class="btn btn-danger mr-3 mt-3 text-white" wire:click="destroy">
                    <i class="las la-trash"></i>
                    Borrar Carrito
                </a>
                <a href="{{ route('ordenes.crear') }}" class="btn btn-primary text-white mt-3">Continuar</a>
            @else
                <a href="{{ route('HomePage') }}" class="btn btn-primary text-white">Ir a inicio</a>
            @endif
        </div>
    </div>

</div>

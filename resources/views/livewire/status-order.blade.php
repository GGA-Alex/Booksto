<div>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Actualizar status de la orden</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="flex">
                <label class="mr-4" for="">
                    <input wire:model.defer="status" type="radio" name="status" value="1">
                    Marcar orden como pendiente de pago.
                </label>
                <label class="mr-4" for="">
                    <input wire:model.defer="status" type="radio" name="status" value="2">
                    Marcar orden como pago recibido.
                </label>
                <label class="mr-4" for="">
                    <input wire:model.defer="status" type="radio" name="status" value="3">
                    Marcar orden como enviada.
                </label>
                <label class="mr-4" for="">
                    <input wire:model.defer="status" type="radio" name="status" value="4">
                    Marcar orden como entregada.
                </label>
                <label class="mr-4" for="">
                    <input wire:model.defer="status" type="radio" name="status" value="5">
                    Marcar orden como cancelada.
                </label>
            </div>
            <div class="flex justify-end items-center">
                <button class="btn btn-dark uppercase w-48" wire:click="saved" wire:loading.attr="disabled"
                    wire:target="saved">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
</div>

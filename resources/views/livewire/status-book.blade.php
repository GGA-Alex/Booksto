<div>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Actualizar status del libro</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="flex">
                <label class="mr-4" for="">
                    <input wire:model.defer="status" type="radio" name="status" value="1">
                    Marcar libro como publicado.
                </label>
                <label class="mr-4" for="">
                    <input wire:model.defer="status" type="radio" name="status" value="2">
                    Marcar libro como borrador.
                </label>
            </div>
            <div class="flex justify-end items-center">
                <button class="btn btn-dark w-48" wire:click="saved" wire:loading.attr="disabled" wire:target="saved">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
</div>

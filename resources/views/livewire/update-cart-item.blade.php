<div class="d-flex">
    <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="decrement" wire:click="decrement">
        <b>
            -
        </b>
    </button>

    <span class="ml-2 mr-2">
        {{ $qty }}
    </span>

    <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="increment" wire:click="increment">
        <b>
            +
        </b>
    </button>
</div>

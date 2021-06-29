<div class="d-flex">
    <button type="button" class="fa fa-minus qty-btn" id="btn-minus" wire:loading.attr="disabled"
        wire:target="decrement" wire:click="decrement">
    </button>

    <span class="ml-2 mr-2">
        {{ $qty }}
    </span>
    <button type="button" class="fa fa-plus qty-btn" id="btn-plus" wire:loading.attr="disabled" wire:target="increment"
        wire:click="increment"></button>
</div>

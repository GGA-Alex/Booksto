<div>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Administrar autores del libro</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <label for="autores">Agregar autor:</label>
            <select class="form-control" name="autores" id="autores" wire:model="author_id">
                <option value="" selected disabled>Seleccione un Autor</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="autores" />
            <button class="btn btn-primary mt-2 w-full" value="Agregar Autor" wire:click="save"
                wire:loading.attr="disabled" wire:target="save">
                Agregar Autor
            </button>
            <ul class="iq-timeline">
                @foreach ($autores as $autor)
                    <li>
                        <div class="timeline-dots border-dark"><i class="ri-bookmark-fill"></i></div>
                        <h6 class="float-left mb-1">{{ $autor->nombre }}</h6>
                        <div class="d-inline-block w-100">
                            <button wire:click="$emit('delete',{{ $autor->id }})" class="btn btn-danger mt-2 w-ful">
                                Eliminar Autor
                            </button>
                        </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>

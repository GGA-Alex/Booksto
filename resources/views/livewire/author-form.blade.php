<div>
    <form action="{{ route('admin.autores.imagenes', $autore) }}" method="POST" class="dropzone"
        id="my-awesome-dropzone" wire:ignore>
    </form>
    @if ($autore->images->count())
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Imagenes del autor</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <ul class="d-inline" style="list-style:none;">
                    @foreach ($autore->images as $image)
                        <li class="mt-2" wire:key="Image-{{ $image->id }}">
                            <img style="width: 10%" src="{{ Storage::url($image->url) }}" alt="">
                            <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"
                                wire:click="deleteImage({{ $image->id }})" wire:loadind.attr="disabled"
                                wire:target="deleteImage()">
                                X
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <form action="{{ route('autores.update', $autore) }}" method="POST" class="mt-5">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control border-gray-300 rounded-lg" name="nombre" id="nombre"
                wire:model="autore.nombre">
            <x-jet-input-error for="nombre" />
        </div>
        <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" class="form-control border-gray-300 rounded-lg" name="pais" id="pais"
                wire:model="autore.pais">
            <x-jet-input-error for="pais" />
        </div>
        <input type="submit" class="btn btn-primary mt-2 " value="Guardar autor"></input>
    </form>
</div>

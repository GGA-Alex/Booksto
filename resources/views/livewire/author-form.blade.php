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
                <ul class="flex flex-wrap" style="list-style:none;">
                    @foreach ($autore->images as $image)
                        <li class="relative" wire:key="Image-{{ $image->id }}">
                            <img class="w-32 h-20 object-cover" src="{{ Storage::url($image->url) }}" alt="">
                            <button type="submit" class="btn btn-danger btn-rounded btn-sm absolute right-2 top-2"
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
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Información basica del autor</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('autores.update', $autore) }}" method="POST">
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
                <input type="submit" class="btn btn-dark mt-2 " value="Actualizar información basica del autor"></input>
            </form>
        </div>
    </div>

</div>

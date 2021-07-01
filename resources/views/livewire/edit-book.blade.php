<div>
    <form action="{{ route('admin.libros.imagenes', $libro) }}" method="POST" class="dropzone"
        id="my-awesome-dropzone" wire:ignore>
    </form>
    @if ($libro->images->count())
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Imagenes del libro</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <ul class="flex flex-wrap" style="list-style:none;">
                    @foreach ($libro->images as $image)
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
    <hr>
    @livewire('status-book',['libro'=>$libro], key('status-book' . $libro->id))
    <hr>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Información basica del libro</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('libros.update', $libro) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" wire:model="libro.nombre">
                    <x-jet-input-error for="nombre" />
                </div>
                <div class=" form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" wire:model="libro.isbn">
                    <x-jet-input-error for="isbn" />
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id" id="category_id"
                        wire:model="libro.category_id">
                        <option value="" selected disabled>Seleccione una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="category_id" />
                </div>
                <div class="form-group">
                    <label for="editorial_id">Editorial:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="editorial_id" id="editorial_id"
                        wire:model="libro.editorial_id">
                        <option value="" selected disabled>Seleccione una editorial</option>
                        @foreach ($editorials as $editorial)
                            <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="editorial_id" />
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <textarea class="form-control" rows="4" name="descripcion" id="descripcion"
                        wire:model="libro.descripcion"></textarea>
                    <x-jet-input-error for="description" />
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" step=".01" class="form-control" name="precio" id="precio"
                        wire:model="libro.precio">
                    <x-jet-input-error for="precio" />
                </div>
                <div class="form-group">
                    <label for="paginas">Paginas:</label>
                    <input type="number" class="form-control" name="paginas" id="paginas" wire:model="libro.paginas">
                    <x-jet-input-error for="paginas" />
                </div>
                <div class="form-group">
                    <label for="año">Año de publicación:</label>
                    <input type="number" class="form-control" name="año" id="año" wire:model="libro.año">
                    <x-jet-input-error for="año" />
                </div>
                <div class="form-group">
                    <label for="edicion">Edición:</label>
                    <input type="number" class="form-control" name="edicion" id="edicion" wire:model="libro.edicion">
                    <x-jet-input-error for="edicion" />
                </div>
                <input type="submit" class="btn btn-dark mt-2" value="Actualizar información basica del libro" />
            </form>
        </div>
    </div>
    <hr>
    @livewire('add-author',['libro' => $libro])
</div>

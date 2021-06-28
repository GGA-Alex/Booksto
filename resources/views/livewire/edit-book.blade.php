<div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <div class="alert text-white bg-danger" role="alert">
                    <div class="iq-alert-text">{{ $error }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('admin.libros.imagenes', $libro) }}" method="POST" class="dropzone"
        id="my-awesome-dropzone">
    </form>
    @if ($libro->images->count())
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Imagenes del libro</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <ul class="d-inline" style="list-style:none;">
                    @foreach ($libro->images as $image)
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
    <form action="{{ route('libros.update', $libro) }}" method="POST" class="mt-5">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" wire:model="libro.nombre">
        </div>
        <div class=" form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" name="isbn" id="isbn" wire:model="libro.isbn">
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
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <textarea class="form-control" rows="4" name="descripcion" id="descripcion"
                wire:model="libro.descripcion"></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step=".01" class="form-control" name="precio" id="precio" wire:model="libro.precio">
        </div>
        <div class="form-group">
            <label for="paginas">Paginas:</label>
            <input type="number" class="form-control" name="paginas" id="paginas" wire:model="libro.paginas">
        </div>
        <div class="form-group">
            <label for="año">Año de publicación:</label>
            <input type="number" class="form-control" name="año" id="año" wire:model="libro.año">
        </div>
        <div class="form-group">
            <label for="edicion">Edición:</label>
            <input type="number" class="form-control" name="edicion" id="edicion" wire:model="libro.edicion">
        </div>

        <input type="submit" class="btn btn-dark" value="Guardar producto" />
    </form>
</div>

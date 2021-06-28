@extends('layouts\Booksto - Layouts\bookstoAdmin')

@section('pageName')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">Dashboard</h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('libros.index') }}">Libros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Formulario</li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Agregar Libro</h4>
                </div>
            </div>
            <div class="iq-card-body">
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
                <form action="{{ route('libros.store') }}" method="POST">

                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class=" form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" class="form-control" name="isbn" id="isbn">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id" id="category_id">
                            <option value="" selected disabled>Seleccione una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editorial_id">Editorial:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="editorial_id" id="editorial_id">
                            <option value="" selected disabled>Seleccione una editorial</option>
                            @foreach ($editorials as $editorial)
                                <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea class="form-control" rows="4" name="descripcion" id="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" step=".01" class="form-control" name="precio" id="precio">
                    </div>
                    <div class="form-group">
                        <label for="paginas">Paginas:</label>
                        <input type="number" class="form-control" name="paginas" id="paginas">
                    </div>
                    <div class="form-group">
                        <label for="año">Año de publicación:</label>
                        <input type="number" class="form-control" name="año" id="año">
                    </div>
                    <div class="form-group">
                        <label for="edicion">Edición:</label>
                        <input type="number" class="form-control" name="edicion" id="edicion">
                    </div>

                    <input type="submit" class="btn btn-dark" value="Guardar producto" />
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
                integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: "image/*",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
            };
        </script>
    @endpush
@endsection

@extends('layouts\Booksto - Layouts\booksto')

@section('content')
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Lista de libros</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a href="admin-add-book.html" class="btn btn-primary">Agrgegar nuevo libro</a>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="data-tables table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 3%;">Id</th>
                                <th style="width: 12%;">Imagen</th>
                                <th style="width: 15%;">Nombre</th>
                                <th style="width: 15%;">Categoria</th>
                                <th style="width: 15%;">Autor(es)</th>
                                <th style="width: 18%;">Descripción</th>
                                <th style="width: 7%;">Precio</th>
                                <th style="width: 15%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>
                                        <img class="img-fluid rounded" src={{ Storage::url($book->images->first()->url) }}
                                            alt="">
                                    </td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>
                                        @foreach ($book->authors as $author)
                                            <p>{{ $author->name }}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        <p class="mb-0"> {{ $book->description }} </p>
                                    </td>
                                    <td>${{ $book->price }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('libros.show',$book)}}">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

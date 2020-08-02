@extends('layouts.index')

@section('content')

    <div class="page-header m-4">
        <div class="group-row">
            <div class="row">
            <h1>Categorías</h1>
            <a href="/categories/add" class="btn btn-success boton-add" title="Add">
                    <i class="mdi mdi-plus"></i></a>
            </div>

        </div>
    </div>

    @if (count($categorias) > 0)
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categorias as $key => $value)
                <tr>
                    <td>{{ $value->id  }}</td>
                    <td>{{ $value->title  }}</td>
                    <td>{{ $value->description  }}</td>
                    <td>
                        <a href="/categories/view/{{ $value->id }}" class="btn btn-info" title="View">
                            <i class="mdi mdi-eye"></i>
                        </a>
                        <a href="/categories/edit/{{ $value->id }}" class="btn btn-warning" title="Edit">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <a href="/categories/remove/{{ $value->id }}" class="btn btn-danger" title="Delete">
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <b>Atención</b>
            <p>
                No Hay Categorìas. <a href="/categories/add">Crear una nueva Categoría</a>.
            </p>
        </div>
    @endif

    <div class="page-header m-4">
        <h1>Productos</h1>
    </div>

    @if (count($productos) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach($productos as $key => $value)
                <tr>
                    <td>{{ $value->id  }}</td>
                    <td>{{ $value->title  }}</td>
                    <td>{{ $value->description  }}</td>
                    <td>
                        <a href="/categories/view/{{ $value->id }}" class="btn btn-info" title="View">
                            <i class="mdi mdi-eye"></i>
                        </a>
                        <a href="/categories/edit/{{ $value->id }}" class="btn btn-warning" title="Edit">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <a href="/categories/remove/{{ $value->id }}" class="btn btn-danger" title="Delete">
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <b>Atención</b>
            <p>
                No Hay Productos. <a href="/categories/add">Crear un nuevo Producto</a>.
            </p>
        </div>
    @endif



@endsection



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Categorías</title>
</head>
<body>
<div class="container">
    <h1 class="my-4">Listado de Categorías</h1>
    <a href="{{ route('categoria.create') }}" class="btn btn-success mb-3">Agregar Categoría</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <th scope="row">{{ $categoria->categoria_id }}</th>
                <td>{{ $categoria->categoria_nombre }}</td>
                <td>{{ $categoria->categoria_descripcion }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('categoria.edit', $categoria->categoria_id) }}" class="btn btn-primary btn-sm mx-1">Editar</a>
                        <form action="{{ route('categoria.destroy', $categoria->categoria_id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>

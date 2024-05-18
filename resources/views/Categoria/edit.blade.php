<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Categoría</title>
</head>
<body>
<div class="container">
    <h1 class="my-4">Editar Categoría</h1>
    <form method="POST" action="{{ route('categoria.update', $categoria->categoria_id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputNombre" class="form-label">Nombre de la Categoría</label>
            <input type="text" class="form-control" id="inputNombre" name="categoria_nombre" value="{{ $categoria->categoria_nombre }}">
        </div>

        <div class="mb-3">
            <label for="inputDescripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="inputDescripcion" name="categoria_descripcion">{{ $categoria->categoria_descripcion }}</textarea>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('categoria.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

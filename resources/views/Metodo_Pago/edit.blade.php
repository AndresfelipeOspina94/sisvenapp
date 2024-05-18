<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Método de Pago</title>
</head>
<body>
<div class="container">
    <h1 class="my-4">Editar Método de Pago</h1>
    <form method="POST" action="{{ route('metodo_pago.update', $metodo_pago->metodo_pago_id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputNombre" class="form-label">Nombre del Método de Pago</label>
            <input type="text" class="form-control" id="inputNombre" name="metodo_pago_nombre" value="{{ $metodo_pago->metodo_pago_nombre }}">
        </div>

        <div class="mb-3">
            <label for="inputObservacion" class="form-label">Observación</label>
            <textarea class="form-control" id="inputObservacion" name="metodo_pago_observacion">{{ $metodo_pago->metodo_pago_observacion }}</textarea>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('metodo_pago.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nuevo Proveedor</title>
</head>
<body>
    <div class="container">
        <h1>Nuevo Proveedor</h1>

        <form method="POST" action="{{ route('proveedor.store') }}">
        @csrf

        <div class="mb-3">
            <label for="inputNombreP" class="form-label">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="inputNombreP" name="proveedor_nombre">
        </div>

        <div class="mb-3">
            <label for="inputNombreC" class="form-label">Nombre del Contacto</label>
            <input type="text" class="form-control" id="inputNombreC" name="proveedor_nombre_contacto">
        </div>

        <div class="mb-3">
            <label for="inputCelular" class="form-label">Numero celular</label>
            <input type="text" class="form-control" id="inputCelular" name="proveedor_celular">
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label">Correo Electronico</label>
            <input type="text" class="form-control" id="inputEmail" name="proveedor_email">
        </div>

        <tr>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
                <a href="{{ route('proveedor.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </tr>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous">
    </script>
</body>
</html>
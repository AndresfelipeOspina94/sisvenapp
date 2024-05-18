<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado Metodos de Pago</title>
</head>
<body>
<div class="container">
    <h1>Listado de Metodos de Pago</h1>
    <a href="{{route('metodo_pago.create') }}" class="btn btn-success">Agregar Metodo de Pago</a> 
    <table class="table">   
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Observacion</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($metodos_pagos as $metodo_pago)
            <tr>
                 <th scope="row">{{ $metodo_pago->metodo_pago_id }}</th>
                 <td>{{ $metodo_pago->metodo_pago_nombre }}</td>
                 <td>{{ $metodo_pago->metodo_pago_observacion}}</td>
                <td>
                    <div>
                        <a href="{{ route('metodo_pago.edit', $metodo_pago->metodo_pago_id) }}"
                            class="btn btn-primary btn-custom">Editar</a>
                        <form action="{{ route('metodo_pago.destroy', $metodo_pago->metodo_pago_id) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-custom">Eliminar</button>
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

<!--<a href="// route('producto.create') }}" class="btn btn-success">Agregar Producto</a>
    <table //class="table">-->
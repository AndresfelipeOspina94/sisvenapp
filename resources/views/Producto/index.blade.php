<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Productos</title>
</head>
<body>
<div class="container">
    <h1>Listado de Productos</h1>
    <a href="{{ route('producto.create') }}" class="btn btn-success">Agregar Producto</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoría</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad en Stock</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                 <th scope="row">{{ $producto->producto_id }}</th>
                 <td>{{ $producto->producto_name }}</td>
                 <td>{{ $producto->categoria->categoria_nombre }}</td>
                 <td>{{ $producto->proveedor->Proveedor_Nombre }}</td>
                 <td>{{ $producto->precio_producto }}</td>
                 <td>{{ $producto->cantidad_stock }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('producto.edit', $producto->producto_id) }}"
                           class="btn btn-primary btn-custom">Editar</a>
                        <form action="{{ route('producto.destroy', $producto->producto_id) }}" method="POST"
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

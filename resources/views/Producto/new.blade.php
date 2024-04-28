<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nuevo Producto</title>
</head>
<body>
<div class="container">
    <h1>Nuevo Producto</h1>
    <form method="POST" action="{{ route('producto.store') }}">
        @csrf
        <div class="mb-3">
            <label for="inputNombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="inputNombre" name="producto_name">
        </div>

        <div class="mb-3">
            <label for="inputCategoria" class="form-label">Categoría</label>
            <select class="form-select" id="inputCategoria" name="categoria_id">
                <option selected>Seleccione un Categoria...</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->categoria_Id }}">{{ $categoria->categoria_nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="inputProveedor" class="form-label">Proveedor</label>
            <select class="form-select" id="inputProveedor" name="proveedor_id">
                <option selected>Seleccione un Proveedor...</option>                
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->proveedor_Id }}">{{ $proveedor->proveedor_nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="inputPrecio" class="form-label">Precio del Producto</label>
            <input type="text" class="form-control" id="inputPrecio" name="precio_producto">
        </div>

        <div class="mb-3">
            <label for="inputStock" class="form-label">Cantidad en Stock</label>
            <input type="text" class="form-control" id="inputStock" name="cantidad_stock">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            <a href="{{ route('producto.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

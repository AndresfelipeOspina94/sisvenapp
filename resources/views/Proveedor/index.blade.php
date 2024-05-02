<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Proveedores</title>
</head>
<body>
<div class="container">
    <h1>Listado de Proveedores</h1>
    <a href="{{ route('proveedor.create') }}" class="btn btn-success">Agregar Proveedor</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Contacto</th>
            <th scope="col">Celular</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proveedores as $proveedor)
            <tr>
                 <th scope="row">{{ $proveedor->proveedor_id }}</th>
                 <td>{{ $proveedor->proveedor_nombre }}</td>
                 <td>{{ $proveedor->proveedor_nombre_contacto }}</td>
                 <td>{{ $proveedor->proveedor_celular }}</td>
                 <td>{{ $proveedor->proveedor_email }}</td>
                 <td>
                    <div>
                        <a href="{{ route('proveedor.edit', $proveedor->proveedor_id) }}"
                            class="btn btn-primary btn-custom">Editar</a>
                        <form action="{{ route('proveedor.destroy', $proveedor->proveedor_id) }}" method="POST"
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

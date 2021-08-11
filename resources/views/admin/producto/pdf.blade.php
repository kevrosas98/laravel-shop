<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ficha PDF - Libro {{ $producto->nombre }}</title>
</head>

<body>

    <style>
        #producto {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #producto td,
        #producto th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #producto tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #producto tr:hover {
            background-color: #ddd;
        }

        #producto th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>

    <h1>Ficha del producto #{{ $producto->id }}</h1>
    <table id="producto">
        <tr>
            <th>Portada :</th>
            <td><img src="{{Request::root()}}/storage/img/{{ $imagen[2] }}" style="width: 250px;" />
            </td>
        </tr>
        <tr>
            <th>Categoria :</th>
            <td>{{ $producto->categoria->nombre }} </td>
        </tr>
        <tr>
            <th>Nombre :</th>
            <td>{{ $producto->nombre }}</td>
        </tr>
        <tr>
            <th>URL Seo :</th>
            <td>{{ $producto->url_seo }}</td>
        </tr>
        <tr>
            <th>Precio :</th>
            <td>S/ {{ $producto->precio }}</td>
        </tr>
        <tr>
            <th>Existencias :</th>
            <td>{{ $producto->existencias }}</td>
        </tr>
        <tr>
            <th>Resumen :</th>
            <td>{{ $producto->descripcion }}</td>
        </tr>        
        <tr>
            <th>Portada :</th>
            <td>{{ $producto->portada }}</td>
        </tr>
        <tr>
            <th>Estado :</th>
            <td>{{ $producto->estado }}</td>
        </tr>
    </table>
</body>

</html>
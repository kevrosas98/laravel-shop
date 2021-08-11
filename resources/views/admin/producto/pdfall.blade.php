<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listado de Productos</title>
</head>

<body>

    <style>
        #producto {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
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

        #producto th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }
    </style>

    <h1>Productos Registrados</h1>
    <table id="producto">
        <tr>
            <th>Imagen</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Url Seo</th>
            <th>Precio</th>
            <th>Existencias</th>
            <th>Portada</th>
            <th>Estado</th>
            
        </tr>
        @foreach($productos as $producto)
        <tr>
        @php
            $eimg = array();
            $eimg = explode('/', $producto->imagen);
            $portada =  $eimg[2];
        @endphp
            <td align="center"><img src="{{Request::root()}}/storage/img/{{ $portada }}" style="width: 80px;" />
            <td>{{ $producto->categoria->nombre }} </td>
            <td>{{ $producto->nombre }} </td>
            <td>{{ $producto->url_seo }} </td>
            <td>S/ {{ $producto->precio }} </td>
            <td>{{ $producto->existencias }} </td>
            <td>{{ $producto->portada }} </td>
            <td>{{ $producto->estado }} </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
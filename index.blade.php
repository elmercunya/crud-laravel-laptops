<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptops</title>
</head>
<body>

    @if(session('success'))
        <div style="background-color: lightgreen; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('laptops.create') }}">Crear nuevo</a>

    <form method = "GET" action = "{{route('laptops.index')}}">
        <input type = "text" name = "buscar">

        <button>Buscar</button>
    </form>

    

    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Memoria ram</th>
                <th>Disco</th>
                <th>Precio venta</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($laptops as $laptop)
                <tr>
                    <td>{{$laptop->marca->nombre}}</td>
                    <td>{{$laptop->modelo}}</td>
                    <td>{{$laptop->memoria_ram}}</td>
                    <td>{{$laptop->disco}}</td>
                    <td>{{$laptop->precio_venta}}</td>
                    <td>{{$laptop->estado}}</td>
                    <td>
                        <a href="{{ route('laptops.edit', $laptop->id) }}">Editar</a>
                        <form action = "{{route('laptops.destroy', $laptop->id)}}" method = "POST">
                            @csrf
                            @method('DELETE')
                            <button type = "submit" onclick ="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $laptops->links() }}

    
</body>
</html>
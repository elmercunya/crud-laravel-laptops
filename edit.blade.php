<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Laptop</title>
</head>
<body>
    <h1>Crear nueva laptop</h1>
    <form method = "POST" action = "{{route('laptops.update', $laptop->id)}}">
        @csrf
        @method('PUT')
        <div>
            <label>Marca:</label>
            <select name = "marca_id">
                @foreach($marcas as $marca)
                    <option value = "{{$marca->id}}" @if($laptop->marca_id == $marca->id) selected @endif>{{$marca->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Modelo:</label>
            <input type = "text" name = "modelo" value = "{{$laptop->modelo}}">
        </div>
        <div>
            <label>Memoria ram:</label>
            <input type = "text" name = "memoria_ram" value = "{{$laptop->memoria_ram}}">
        </div>
        <div>
            <label>Disco:</label>
            <input type = "text" name = "disco" value = "{{$laptop->disco}}">
        </div>
        <div>
            <label>Precio Venta:</label>
            <input type = "text" name = "precio_venta" value = "{{$laptop->precio_venta}}">
        </div>

        <button type = "submit">Guardar Laptop</button>
    </form>
</body>
</html>
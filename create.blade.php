<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Laptop</title>
</head>
<body>
    

    <h1>Crear nueva laptop</h1>
    <form method = "POST" action = "{{route('laptops.store')}}">
        @csrf
        <div>
            <label>Marca:</label>
            <select name = "marca_id">
                @foreach($marcas as $marca)
                    <option value = "{{$marca->id}}">{{$marca->nombre}}</option>
                @endforeach
            </select>
            @error('marca_id')<span style = "color:red">{{$message}}</span> @enderror
        </div>
        <div>
            <label>Modelo:</label>
            <input type = "text" name = "modelo">
            @error('modelo')<span style = "color:red">{{$message}}</span> @enderror
        </div>
        <div>
            <label>Memoria ram:</label>
            <input type = "text" name = "memoria_ram">
            @error('memoria_ram')<span style = "color:red">{{$message}}</span> @enderror
        </div>
        <div>
            <label>Disco:</label>
            <input type = "text" name = "disco">
            @error('disco')<span style = "color:red">{{$message}}</span> @enderror
        </div>
        <div>
            <label>Precio Venta:</label>
            <input type = "text" name = "precio_venta">
            @error('precio_venta')<span style = "color:red">{{$message}}</span> @enderror
        </div>

        <button type = "submit">Guardar Laptop</button>
    </form>
</body>
</html>
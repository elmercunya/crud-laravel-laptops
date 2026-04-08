<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Marca;

class LaptopController extends Controller
{
    public function index(Request $request) {

        $busqueda = $request->input('buscar');

        $query = Laptop::with('marca');

        if($busqueda) {
            $query->where('modelo', 'LIKE', '%'.$busqueda.'%');
        }

        $laptops = $query->paginate(10)->withQueryString();     

        return view('laptops.index', compact('laptops'));
    }

    public function create() {

        $marcas = Marca::all();

        return view('laptops.create', compact('marcas'));
    }

    public function store(Request $request) {

        $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo' => 'required|string|max:255',
            'memoria_ram' => 'required|string|max:255',
            'disco' => 'required|string|max:255',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        Laptop::create($request->all());

        return redirect()->route('laptops.index')->with('success', 'Laptop creado exitosamente');
    }

    public function edit(string $id) {
        $laptop = Laptop::findOrFail($id);

        $marcas = Marca::all();

        return view('laptops.edit', compact('laptop', 'marcas'));
    }

    public function update(Request $request, string $id) {

        $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo' => 'required|string|max:255',
            'memoria_ram' => 'required|string|max:255',
            'disco' => 'required|string|max:255',
            'precio_venta' => 'required|numeric|min:0',
        ]);


        $laptop = Laptop::find($id);

        $laptop->update($request->all());

        return redirect()->route('laptops.index')->with('success', 'Laptop actualizada exitosamente');
    }

    public function destroy(string $id) {
        $laptop = Laptop::find($id);

        $laptop->delete();

        return redirect()->route('laptops.index')->with('success', 'Laptop eliminada exitosamente');
    }
}

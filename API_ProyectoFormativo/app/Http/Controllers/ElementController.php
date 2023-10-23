<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $element = Element::all();
            return response()->json($element,200);
        } catch (\Throwable $th) {
            return response()->json(['msg'=>'Error en la solicitud'],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre_elemento'=>'required|string',
                'tipo_elemento'=>'required|string',
                'categoria_elemento'=>'required|string',
                'fechaVencimiento_elemento'=>'required|string',
            ]);

            $element = Element::create([
                'nombre_elemento'=>$request->nombre_elemento,
                'tipo_elemento'=>$request->tipo_elemento,
                'categoria_elemento'=>$request->categoria_elemento,
                'fechaVencimiento_elemento'=>$request->fechaVencimiento_elemento,
            ]);
            return response()->json($element,201);
        } catch (\Throwable $th) {
            return response()->json(['msg'=>'Error en la solicitud'],404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $element = Element::findOrFail($id); // Busca al usuario por su ID

            return response()->json($element, 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje'=>'error en la solicitud'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $element = Element::findOrFail($id); // Busca al usuario por su ID 
            $element->update($request->all()); // Actualiza Usuario
            return response()->json($element, 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje'=>'error en la solicitud'.$e], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $element = Element::findOrFail($id); // Busca al usuario por su ID
            $element->delete(); // Elimina el usuario

            return response()->json([
                'message' => 'Usuario eliminado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'No se pudo eliminar el usuario'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Http\Resources\Usuario as UsuarioResource;
use App\Http\Resources\UsuarioCollection;

class UsuarioController extends Controller
{
    public function index()
    {
        return new UsuarioCollection(Usuario::all());
    }
 
    public function show($id)
    {
        return new UsuarioResource(Usuario::findOrFail($id));
    }
    
    public function delete($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }
}

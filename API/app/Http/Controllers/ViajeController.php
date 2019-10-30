<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viaje;
use App\Http\Resources\Viaje as ViajeResource;
use App\Http\Resources\ViajeCollection;

class ViajeController extends Controller
{
    public function index()
    {
        return new ViajeCollection(Viaje::all());
    }
 
    public function showI($id)
    {
        return new ViajeResource(Viaje::findOrFail($id));
    }

    public function showN($n)
    {
        return Viaje::where('nombre','like','%'.$n.'%')
                ->get();
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        // ]);

        $viaje = new Viaje;

        $viaje->usuario = '1';
        $viaje->foto = 'https://source.unsplash.com/400x300/?travel,cities';
        $viaje->nombre = $request->nombre;
        $viaje->descripcion = $request->descripcion;
        $viaje->lugar = $request->lugar;
        $viaje->presupuesto = $request->presupuesto;
        $viaje->planeado = $request->planeado;
        $viaje->realizado = $request->realizado;
        $viaje->fecha = $request->fecha;

        $viaje->save();

        if($viaje->save()){
            return response()->json(array('success' => true, 'id' => $viaje->id), 200);
        }

        
    }

    public function delete($id){

        $viaje = Viaje::findOrFail($id);
        $viaje -> delete();

        return response()->json(null,204);
    }

    public function update($id, Request $request){
        $viaje = Viaje::findOrFail($id);

        //nombre
        $request->nombre ? $viaje->nombre = $request->nombre : $viaje->nombre = $viaje->nombre;       
        //descripcion
        $request->descripcion ? $viaje->descripcion = $request->descripcion : $viaje->descripcion = $viaje->descripcion;
        //lugar
        $request->lugar ? $viaje->lugar = $request->lugar : $viaje->lugar = $viaje->lugar;
        //presupuesto
        $request->presupuesto ? $viaje->presupuesto = $request->presupuesto : $viaje->presupuesto = $viaje->presupuesto;
        //planeado
        $request->planeado ? $viaje->planeado = $request->planeado : $viaje->planeado = $viaje->planeado;
        // //realizado
        $request->realizado ? $viaje->realizado = $request->realizado : $viaje->realizado = $viaje->realizado;
        // //fecha
        $request->fecha ? $viaje->fecha = $request->fecha : $viaje->fecha = $viaje->fecha;
        
        $viaje->save();
       

        if($viaje->save()){
            return response()->json(array('success' => true), 200);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Traits\TraitSubirArchivo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App;

class ControladorMapa extends Controller
{
    //
    use TraitSubirArchivo;

    public function mapa(){
        //$coleccion = App\Models\Mapa::all();
        $coleccion = App\Models\Mapa::paginate(3);
        return view('mapa',compact('coleccion'));
    }

    public function nuevoMapa(Request $request){
        $nuevoMapa = new App\Models\mapa;
        $request->validate([
            'marcador'=>'required',
            'lugar'=>'required',
            'npersonas'=>'required',
            'niños'=>'required',
            'medidas'=>'required'
        ]);

        if($request->has('marcador')){
            $imagen=$request->file('marcador');
            $nombreImagen = Str::random(15);
            $folder = 'marcadores';

            $imagenCargada = $this->subirArchivo($imagen, $folder, 'public', $nombreImagen);
            $nuevoMapa->marcador = $imagenCargada;
        }
        $nuevoMapa->lugar=$request->lugar;
        $nuevoMapa->npersonas=$request->npersonas;
        $nuevoMapa->niños=$request->niños;
        $nuevoMapa->medidas=$request->medidas;
        $nuevoMapa->save();
        return back()->with('mensaje','Nueva zona de riesgo agregada');
    }

    public function detalleMapa($id){
        $mapa = App\Models\mapa::findOrFail($id);
        return view ('mapa.detalle',compact('mapa'));
    }

    public function editarMapa($id){
        $mapa = App\Models\mapa::findOrFail($id);
        return view('mapa.editar',compact('mapa'));
    }

    public function actualizarMapa(Request $request,$id){
        $mapaActualizar = App\Models\mapa::findOrFail($id);
        if($request->has('marcador')){
            $imagen=$request->file('marcador');
            $nombreImagen = Str::random(15);
            $folder = 'marcadores';

            $imagenCargada = $this->subirArchivo($imagen, $folder, 'public', $nombreImagen);
            $mapaActualizar->marcador = $imagenCargada;
        }
        $mapaActualizar->lugar =$request->lugar;
        $mapaActualizar->npersonas =$request->npersonas;
        $mapaActualizar->niños =$request->niños;
        $mapaActualizar->medidas =$request->medidas;
        $mapaActualizar->save();
        return back()->with('modificado','Zona de riesgo modificada');
    }

    public function eliminarMapa($id){
        $eliminarMapa = App\Models\mapa::findOrFail($id);
        $eliminarMapa->delete();
        return back()->with('eliminacion','Zona de riesgo eliminada');
    }
}

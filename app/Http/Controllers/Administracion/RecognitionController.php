<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Models\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecognitionController extends Controller
{
    public function getRecognitions(){
        $recognitions = Recognition::with('Collaborators')->get();
        return response()->json($recognitions);
    }
    //funcion para listar busqueda colaboradores
    public function getListRecognitions(Request $request){
        
        $busqueda=trim($request->sbusqueda);      
        $colaborador=DB::table('collaborators')
            ->select('name','cedula','area_id')
            ->where('name','LIKE','%'.$busqueda.'%')
            // ->orWhere('last_name','LIKE','%'.$busqueda.'%')
            ->first(); 
        
        $recognitions = Recognition::where('collaborator_id',$colaborador->id)->get(); 
        return response()->json($recognitions);
    }
}

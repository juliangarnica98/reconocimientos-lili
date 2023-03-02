<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Collaborator;
use App\Models\Recognition;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function setReconocimineto(Request $request){
        $colaborador=Collaborator::where('name','LIKE','%'.$request->colaborador.'%')->first();
        $recognition= new Recognition();
        $recognition->hehaviors=str_replace ( "." , " / " , implode( $request->ListComportamientos));
        $recognition->message=$request->mensaje;
        $recognition->skills=$request->competencia;
        $recognition->name_collaborator=$request->nombre_colaborador;
        $colaborador->recognitions()->save($recognition);

        
    }
    public function getColaborador(Request $request){
        $colaborator=Collaborator::where('cedula',$request->cedula)->first();
        $colaboratornom=$colaborator->name;
        return response()->json($colaboratornom);

    }
    public function getColaboradores(Request $request){

        $nombres_area = [];
        $area=Area::where('name',$request->area)->first();
        $area_id=$area->id;
        $colaboradores=Collaborator::where('area_id',$area_id)->get();
        foreach ($colaboradores as $colaborador) {
            array_push($nombres_area,$colaborador->name);
        }
        return response()->json($nombres_area);

    }
    
    
}


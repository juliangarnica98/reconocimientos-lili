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
        $collaborators=Collaborator::get();
        return response()->json(['recognitions'=> $recognitions,'collaborators'=>$collaborators]);
        // return response()->json(['item_image ' => $item_image, 'item_something' => $item_something, 'item_more' => $item_more  ]);
    }
    //funcion para listar busqueda colaboradores
    public function getListRecognitions(Request $request){
        
        $busqueda=trim($request->sbusqueda);      
        $colaborador=DB::table('collaborators')
            ->select('id','name','cedula','area_id')
            ->where('name','LIKE','%'.$busqueda.'%')
            ->first(); 
            
        $recognitions = Recognition::where('collaborator_id',$colaborador->id)->get(); 
        // dd($recognitions);
        $collaborators=Collaborator::get();
        return response()->json(['recognitions'=> $recognitions,'collaborators'=>$collaborators]);
    }
}

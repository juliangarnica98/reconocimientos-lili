<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Imports\CollaboratorsImport;
use App\Models\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ColaboradorController extends Controller
{
    //funcion para listar colaboradores
    public function getCollaborators(){
        $collaborators = Collaborator::all();
        return response()->json($collaborators);
    }
    //funcion para listar busqueda colaboradores
    public function getListCollaborators(Request $request){
        
        $busqueda=trim($request->sbusqueda);        
        
        $collaborators = DB::table('collaborators')
                            ->select('name','cedula','area_id')
                            ->where('name','LIKE','%'.$busqueda.'%')
                            ->orWhere('last_name','LIKE','%'.$busqueda.'%')
                            ->orWhere('cedula','LIKE','%'.$busqueda.'%')
                            ->orderBy('name','asc')
                            ->get();  
        return response()->json($collaborators);
    }
    // funcion para importar colaboradores
    public function ImportCollaborator(Request $request){

        Excel::import(new CollaboratorsImport, $request->file('file'));
        return response()->json('¡Se ha importado colaboradores correctamente!');
    }
    

    
}

<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Imports\CollaboratorsImport;
use App\Models\Area;
use App\Models\Collaborator;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ColaboradorController extends Controller
{
    //funcion para listar colaboradores
    public function getCollaborators(){
        $collaborators = Collaborator::where('state',1)->paginate(10);
       
        $areas=Area::all();
        
        return response()->json(['collaborators'=>$collaborators,'areas'=>$areas]);
    }
    //funcion para listar busqueda colaboradores
    public function getListCollaborators(Request $request){
        
        $busqueda=trim($request->sbusqueda);        
        
        $collaborators = DB::table('collaborators')
                            ->select('name','cedula','area_id')
                            ->where('name','LIKE','%'.$busqueda.'%')->where('state',1)
                            ->orWhere('cedula','LIKE','%'.$busqueda.'%')
                            ->orderBy('name','asc')
                            ->paginate(10); 
                          
        
        $areas=Area::all();
       
        return response()->json(['collaborators'=>$collaborators,'areas'=>$areas]);
    }
    // funcion para importar colaboradores
    public function ImportCollaborator(Request $request){

        $file = $request->file('file');
        if(!empty($request->file('file'))){
            $file->store('importCollaborators');;
        
        }
        if($file == null){
            return ['error' =>'Seleccione un archivo'];
        } 
        $validator = Validator::make($request->all(), [
            'file*' => 'required|mimes:xlsx'
        ]);
        
        if($validator->fails()){
            return ['error' =>'Seleccione un archivo valido'];
        }

        try {
        $collaborators = Collaborator::all();
        if($collaborators){
            foreach ($collaborators as $colaborador) {                
                $colaborador->state=0;
                $colaborador->save();  
            }
        }
        Excel::import(new CollaboratorsImport, $request->file('file'));
        } catch (ErrorException $e) {
            return ['error' =>'No se ha encontrado alguna columna en el archivo'];
        }catch (QueryException $x) {
            return ['error' =>'Existen campos obligatorios que están vacios'];
        }catch (\Exception $x) {
            return ['error' =>'Existe un error en el archivo'];
        }

        return ['success' =>'¡Se ha importado colaboradores correctamente!'];
        // return response()->json('message','¡Se ha importado colaboradores correctamente!');
    }   
}

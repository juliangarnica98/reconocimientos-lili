<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getReconocidos(){
     
        $areacedi_id=1;
        $areaadmin_id=2;
        $area_comercial=3;

        $max_votos_ce=Collaborator::where('area_id',$areacedi_id)->max('votes');
        $max_cedi =Collaborator::where('votes',$max_votos_ce)->where('area_id',$areacedi_id)->first();
        $nom_max_cedi = $max_votos_ce != 0 ? $max_cedi->name : 'NO HAY RECONOCIDO';

        $max_votos_ad=Collaborator::where('area_id',$areaadmin_id)->max('votes');
        $max_admin =Collaborator::where('votes',$max_votos_ad)->where('area_id',$areaadmin_id)->first();
        $nom_max_admin = $max_votos_ad != 0 ? $max_admin->name : 'NO HAY RECONOCIDO';

        $max_votos_co=Collaborator::where('area_id',$area_comercial)->max('votes');
        $max_comercial =Collaborator::where('votes',$max_votos_co)->where('area_id',$area_comercial)->first();
        $nom_max_comercial = $max_votos_co != 0 ? $max_comercial->name : 'NO HAY RECONOCIDO';

        return response()->json(['nom_max_cedi'=> $nom_max_cedi,'nom_max_admin'=>$nom_max_admin,'nom_max_comercial'=>$nom_max_comercial]);

    }
    public function getParticipacion(){
        $total_cedi=Collaborator::where('area_id',1)->count();
        $participacion_cedi=Collaborator::where('participation',1)->where('area_id',1)->count();

        $total_admin=Collaborator::where('area_id',2)->count();
        $participacion_admin=Collaborator::where('participation',1)->where('area_id',2)->count();

        $total_comercial=Collaborator::where('area_id',3)->count();
        $participacion_comercial=Collaborator::where('participation',1)->where('area_id',3)->count();
        
        $si_cedi = round((((float)$participacion_cedi * 100) / $total_cedi), 1);  
        $si_admin = round((((float)$participacion_admin * 100) / $total_admin), 1);  
        $si_comercial = round((((float)$participacion_comercial * 100) / $total_comercial), 1);  


        return response()->json(['si_cedi'=> $si_cedi,'si_admin'=>$si_admin,'si_comercial'=>$si_comercial]);
        

    }
}

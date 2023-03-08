<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Collaborator;
use App\Models\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    public function getReconocimientosMes(){
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        
        $reconocimientos= Recognition::where('mes_actual',Carbon::now()->format('m'))->get();
        $count_reconocimientos=count($reconocimientos);
        $mes_reconocimientos=$meses[(int)Carbon::now()->format('m')-1];
        
        $reconocimientos_1= Recognition::where('mes_actual',Carbon::now()->subMonth()->format('m'))->get();
        $count_reconocimientos1=count($reconocimientos_1);
        $mes_reconocimientos1=$meses[(int)Carbon::now()->subMonth()->format('m')-1];

        $reconocimientos_2= Recognition::where('mes_actual',Carbon::now()->subMonth(2)->format('m'))->get();
        $count_reconocimientos2=count($reconocimientos_2);
        $mes_reconocimientos2=$meses[(int)Carbon::now()->subMonth(2)->format('m')-1];

        $reconocimientos_3= Recognition::where('mes_actual',Carbon::now()->subMonth(3)->format('m'))->get();
        $count_reconocimientos3=count($reconocimientos_3);
        $mes_reconocimientos3=$meses[(int)Carbon::now()->subMonth(3)->format('m')-1];

        $reconocimientos_4= Recognition::where('mes_actual',Carbon::now()->subMonth(4)->format('m'))->get();
        $count_reconocimientos4=count($reconocimientos_4);
        $mes_reconocimientos4=$meses[(int)Carbon::now()->subMonth(4)->format('m')-1];
     
        $meses_response=[$mes_reconocimientos4,$mes_reconocimientos3,$mes_reconocimientos2,$mes_reconocimientos1,$mes_reconocimientos];
        $values_response=[$count_reconocimientos4,$count_reconocimientos3,$count_reconocimientos2,$count_reconocimientos1,$count_reconocimientos];
        
        // return ['meses'=>$meses_response,'values'=>$values_response];
        return response()->json(['meses'=>$meses_response,'values'=>$values_response]);
    }
}

<?php

namespace App\Imports;

use App\Models\Collaborator;
use App\Models\Area;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PHPUnit\Framework\SkippedTest;
use Throwable;

class CollaboratorsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors; 


    public function model(array $row)
    {
        // $collaborators = Collaborator::whereNotIn('cedula',[$row['documento']]);

        
        $colaboratora_ant=Collaborator::where('cedula',$row['documento'])->first();
        
        if($colaboratora_ant) {
            $colaboratora_ant->state=1;
            $colaboratora_ant->votes=0;
            $colaboratora_ant->participation=0;
            $colaboratora_ant->intentos=0;
            $colaboratora_ant->save();   
        }
        else{
            $area= Area::where('name',$row['ceco'])->first();
            return new Collaborator([
                'name' => $row['nombres']." ".$row['apellidos'],
                'cedula' => $row['documento'],
                'area_id' => $area->id,
            ]);
        }

            // Collaborator::updateOrCreate(
            //     ['name' => $res->name],
            //     ['symbol' => $res->symbol, 'name' => $res->rank]
            // );
    
        

       
    
    }

    public function rules(): array
    {
        return [
            // 'name' => ['required','string',],
            // 'email' => ['required','email'],
            // 'cargo' => ['required'],
            // 'regional_id' => ['required'],
        ];
    }
    public function onError(Throwable $e)
    {
    }
    public function onFailure(Failure ...$failures)
    {
    }
       
}

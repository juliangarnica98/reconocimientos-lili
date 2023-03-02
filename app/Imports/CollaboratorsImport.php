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
        $area= Area::where('name',$row['area'])->first();
        return new Collaborator([
            'name' => $row['nombres']." ".$row['apellidos'],
            // 'last_name'=>$row['apellidos'], 
            'cedula' => $row['documento'],
            'area_id' => $area->id,
        ]);
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

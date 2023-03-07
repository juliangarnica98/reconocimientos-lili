<?php

namespace Database\Seeders;
use App\Models\Area;

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
            'name' => 'CEDI'
            ],
            [
            'name' => 'ADMINISTRATIVO'
            ]
            ,[
            'name' => 'COMERCIAL'
            ]
        ];
        foreach ($data as $areas) {
            Area::create($areas);
        }
    }

    
}

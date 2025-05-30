<?php

namespace Database\Seeders;

use App\Models\TipoInforme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoInformeSeeder extends Seeder
{

    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Modular', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Proyecto de Titulacion', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Proyecto de Investigacion', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Proyecto de Feria Tecnologica', 'created_at' => now(), 'updated_at' => now()],
        ];
        foreach ($tipos as $tipo) {
            TipoInforme::create($tipo);
        }
    }
}

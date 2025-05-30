<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AutorSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(TipoInformeSeeder::class);
        $this->call(InformeSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(AutorInformeSeeder::class);
    }
}

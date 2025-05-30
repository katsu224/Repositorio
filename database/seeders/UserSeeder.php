<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

   public function run(): void
   {
      User::create([
         'full_name' => 'Joel Flores Barona',
         'username' => 'Dzhoel',
         'password' => bcrypt('123456'),
         'profile_photo' => 'foto1.jpeg',
      ]);

      User::create([
         'full_name' => 'Anghelo Torres Villanueva',
         'username' => 'Anghelo',
         'password' => bcrypt('123456'),
         'profile_photo' => 'foto2.jpeg',
      ]);

      User::create([
         'full_name' => 'John Veliz Cruz',
         'username' => 'Veliz',
         'password' => bcrypt('123456'),
         'profile_photo' => 'foto3.jpeg',
      ]);
   }
}

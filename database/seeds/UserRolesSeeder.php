<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
     DB::table('roles')->insert([
            'nombre' => 'Administrador'
        ]);
      DB::table('roles')->insert([
            'nombre' => 'Director de Escuela'
        ]);
    }
}

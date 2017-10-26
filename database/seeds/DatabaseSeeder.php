<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(UserRolesSeeder::class);
        DB::table('roles')->insert([
            'nombre' => 'Administrador'
        ]);
      DB::table('roles')->insert([
            'nombre' => 'Director de Escuela'
        ]);
    }
}

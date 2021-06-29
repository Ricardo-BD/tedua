<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Usercafe;

class UsercafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Usercafe::create([
            'nombre_completo' => 'Administrador',
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'idrole' => '1',
        ]);
        Usercafe::create([
            'nombre_completo' => 'Mesero',
            'name' => 'Mesero01',
            'email' => 'admin@admi.com',
            'password' => Hash::make('123456'),
            'idrole' => '4',
        ]);
    }
}

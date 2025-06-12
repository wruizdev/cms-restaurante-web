<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Primero evitar duplicados si ya existe el usuario

        if(!Usuario::where('email', 'admin@admin.com')->exists()){
            Usuario::create([
                'nick'=> 'superadmin',
                'email'=> 'admin@admin.com',
                'password'=> Hash::make('admin1234'),
                'fecha_alta'=>now(),
                'rol'=> 0, //0=superadmin
            ]);
        }
    }
}

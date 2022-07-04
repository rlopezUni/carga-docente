<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Area;
use App\Models\Plantel;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
        'name' => 'nacho',
        'email' => 'nacho@test.com',
        'password' => bcrypt('12345678')
        ]);
        Area::create([
        'area' => 'Bachilleratos'
        ]);
        Area::create([
        'area' => 'Arquitec y Dis'
        ]);
        Area::create([
        'area' => 'Ingenierías'
        ]);
        Area::create([
        'area' => 'Salud'
        ]);
        Area::create([
        'area' => 'Económic y Adminis'
        ]);
        Area::create([
        'area' => 'Humanidades'
        ]);
        Area::create([
        'area' => 'Sociales'
        ]);
        Plantel::create([
        'plantel' => 'Tlaquepaque'
        ]);
        Plantel::create([
        'plantel' => 'Jardines del Bosque'
        ]);
        Plantel::create([
        'plantel' => 'Tonala'
        ]);
        Plantel::create([
        'plantel' => 'Online'
        ]);
        Plantel::create([
        'plantel' => 'Centro Historico'
        ]);
        Plantel::create([
        'plantel' => 'Loma Bonita'
        ]);
        



             
    }
}

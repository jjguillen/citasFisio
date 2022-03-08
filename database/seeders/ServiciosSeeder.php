<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([ 'servicio' => 'Masaje completo', 'imagen' => '' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Masaje tailandés', 'imagen' => '' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Tratamiento cuello', 'imagen' => '' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Tratamiento espalda', 'imagen' => '' ]);
        DB::table('servicios')->insert([ 'servicio' => 'EPI', 'imagen' => '' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Masaje completo', 'imagen' => '' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Drenaje linfático', 'imagen' => '' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Tratamiento deportivo', 'imagen' => '' ]);
    }
}

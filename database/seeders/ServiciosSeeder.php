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
        DB::table('servicios')->insert([ 'servicio' => 'Masaje completo' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Masaje tailandés' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Tratamiento cuello' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Tratamiento espalda' ]);
        DB::table('servicios')->insert([ 'servicio' => 'EPI' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Masaje completo' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Drenaje linfático' ]);
        DB::table('servicios')->insert([ 'servicio' => 'Tratamiento deportivo' ]);
    }
}

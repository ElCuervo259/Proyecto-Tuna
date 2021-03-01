<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheatreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::insert("INSERT INTO theatres VALUES( NULL,'Cervantes','C/Arriba', 1000,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO theatres VALUES( NULL,'Echegaray','C/Abajo', 1050,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO theatres VALUES( NULL,'Soho','C/Izquierda',900 ,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO theatres VALUES( NULL,'Cochera','C/Derecha', 1200,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO theatres VALUES( NULL,'Cultura MVA','C/Diagonal',500 ,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO theatres VALUES( NULL,'Carranque','C/Torcida',1200 ,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO theatres VALUES( NULL,'Principal MVA','C/Encima',900 ,NULL, CURTIME(), CURTIME());");


    }
}

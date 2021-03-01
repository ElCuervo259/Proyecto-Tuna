<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::insert("INSERT INTO shows VALUES( NULL,'Lunes',1,1, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Martes',1,2, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Jueves',1,3, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Jueves',2,1, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Lunes',2,1, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Lunes',2,2, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Viernes',3,3, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Miercoles',3,3, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Miercoles',4,4, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO shows VALUES( NULL,'Miercoles',3,4, CURTIME(), CURTIME());");

        
    }
}

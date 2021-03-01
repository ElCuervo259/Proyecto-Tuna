<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor Tuna',1, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor Tuna mas tuna',1, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL, 'Mas Simpatica',2,CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor Bandera' ,2, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor Pandereta' ,3, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor novato' ,5, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor Instrumental' ,6, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor Cancion original' ,4, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO prizes VALUES( NULL,'Mejor Guitarra',1, CURTIME(), CURTIME());");
    }
}

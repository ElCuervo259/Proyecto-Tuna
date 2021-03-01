<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Malaga', CURTIME(), CURTIME());");

        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Burgos', CURTIME(), CURTIME());");

        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Sevilla', CURTIME(), CURTIME());");

        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Avila', CURTIME(), CURTIME());");

        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Segovia', CURTIME(), CURTIME());");

        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Barcelona', CURTIME(), CURTIME());");

        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Huelva', CURTIME(), CURTIME());");

        DB::insert("INSERT INTO groups VALUES( NULL,'Tuna Magisterio Cadiz', CURTIME(), CURTIME());");
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        DB::insert("INSERT INTO users VALUES( NULL,'Admin','Alejandro','Pestaña', 'Veterano', 1, 'a@g.com', NULL,  
        '" . Hash::make('1') . "',NULL,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO users VALUES( NULL,'User','Juan','Cejilla', 'Veterano', 2, 'j@g.com',  NULL,   
        '" . Hash::make('1') . "',NULL,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO users VALUES( NULL,'User','Manu','Loca', 'Veterano', 3, 'm@g.com',  NULL,   
        '" . Hash::make('1') . "',NULL,NULL, CURTIME(), CURTIME());");
        
        DB::insert("INSERT INTO users VALUES( NULL,'User','Victor','Timon', 'Novato', 1, 't@g.com',  NULL,   
        '" . Hash::make('1') . "',NULL,NULL, CURTIME(), CURTIME());");

        DB::insert("INSERT INTO users VALUES( NULL,'User','Antonio','Lomo', 'Novato', 5, 't@g.com',  NULL,   
        '" . Hash::make('1') . "',NULL,NULL, CURTIME(), CURTIME());");

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;


//pertenece a
    public function group(){

        return $this->belongsTo(Group::class,'group_id');
    }

}

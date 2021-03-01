<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

//pertenece a
public function group(){

    return $this->belongsTo(Group::class,'group_id');
}

//pertenece a
public function theatre(){

    return $this->belongsTo(Theatre::class,'group_id');
}

}

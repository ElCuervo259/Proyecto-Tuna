<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'capacidad',
        'image_path',
    ];

    //relacion uno a muchos
    public function shows(){
        
        return $this->hasMany(Show::class);
    }

}

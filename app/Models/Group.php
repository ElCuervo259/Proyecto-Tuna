<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    //relacion uno a muchos
    public function users(){
        
        return $this->hasMany(User::class);
    }

    //relacion uno a muchos
    public function prizes(){
        
        return $this->hasMany(Prize::class);
    }

    //relacion uno a muchos
    public function shows(){
        
        return $this->hasMany(Show::class);
    }
}
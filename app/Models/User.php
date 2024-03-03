<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;




    public function chambres(){
        return $this->belongsToMany(Chambre::class);
    }

    
    public function reservations(){
        return $this->hasMany(Chambre_User::class);
    }
    
}

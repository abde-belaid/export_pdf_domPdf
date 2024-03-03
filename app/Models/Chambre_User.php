<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chambre_User extends Model
{
    use HasFactory;
    public $table="chambre_user";

    public function users(){
       $this->belongsToMany(User::class);
    }

    public function chambres(){
       $this->belongsToMany(Chambre::class);
    }


   
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable=[
        'description',
        'superficier',
        'etage',
        'prix'
    ];


    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }

    
    public function reservations(){
        return $this->hasMany(Chambre_User::class);
    }

}

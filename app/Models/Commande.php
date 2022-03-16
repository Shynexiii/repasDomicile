<?php

namespace App\Models;

use App\Models\Plat;
use App\Models\User;
use App\Models\Adresse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plats()
    {
        return $this->belongsToMany(Plat::class)->withTimestamps()->withPivot('quantite');
    }

    public function adresse()
    {
        return $this->hasOne(Adresse::class);
    }
}

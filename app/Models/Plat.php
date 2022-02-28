<?php

namespace App\Models;

use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plat extends Model
{
    use HasFactory;
    // protected $table = 'plats';
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image',
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

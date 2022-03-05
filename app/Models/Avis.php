<?php

namespace App\Models;

use App\Models\Plat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'commentaire',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plat()
    {
        return $this->belongsTo(Plat::class);
    }
}

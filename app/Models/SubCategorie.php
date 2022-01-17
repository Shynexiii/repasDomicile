<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function categorie()
    {
        return $this->belongsTO(Categorie::class);
    }
}

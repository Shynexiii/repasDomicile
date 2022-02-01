<?php

namespace App\Models;

use App\Models\SubCategorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategorie::class);
    }

}

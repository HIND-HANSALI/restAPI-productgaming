<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'titreProduit',
        'description',
        'contenu',
        'prix',
        'categorie_id',
        
        'user_id',
    ];
}


?>
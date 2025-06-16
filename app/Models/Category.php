<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Dit is het model voor de categorieën in de database.
class Category extends Model
{
    // Hiermee kun je makkelijk testdata genereren met factories (voor bijvoorbeeld seeds).
    use HasFactory;

    // Deze velden mogen in één keer ingevuld worden (mass assignment).
    protected $fillable = ['name', 'description'];

    // Relatie: een categorie kan meerdere producten hebben.
    public function products()
    {
        // Eén categorie hoort bij meerdere producten.
        return $this->hasMany(Product::class);
    }
}

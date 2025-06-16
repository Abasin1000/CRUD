<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Dit model is voor de producten in je database.
class Product extends Model
{
    // Hiermee kun je makkelijk testdata maken met factories.
    use HasFactory;

    // Deze velden mogen in één keer ingevuld worden (mass assignment).
    protected $fillable = ['category_id', 'name', 'description', 'price', 'stock'];

    // Relatie: elk product hoort bij één categorie.
    public function category()
    {
        // Elk product is gekoppeld aan één categorie.
        return $this->belongsTo(Category::class);
    }
}

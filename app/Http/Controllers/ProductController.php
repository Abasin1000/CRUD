<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Laat alle producten zien
    public function index()
    {
        // Haal alle producten op, inclusief de bijbehorende categorie
        $products = Product::with('category')->get();
        // Stuur de producten naar de index view
        return view('products.index', compact('products'));
    }

    // Laat het formulier zien om een nieuw product toe te voegen
    public function create()
    {
        // Haal alle categorieën op om te kunnen kiezen
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Slaat een nieuw product op in de database
    public function store(Request $request)
    {
        // Check of de ingevulde data klopt (valideren)
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Maak het nieuwe product aan in de database
        Product::create($validated);

        // Ga terug naar het overzicht met een succesbericht
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Laat 1 specifiek product zien
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Laat het formulier zien om een product te bewerken
    public function edit(Product $product)
    {
        // Haal alle categorieën op voor het dropdown-menu
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Slaat de aanpassingen op bij een product
    public function update(Request $request, Product $product)
    {
        // Check of de ingevulde data klopt (valideren)
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Update het product in de database
        $product->update($validated);

        // Ga terug naar het overzicht met een succesbericht
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Verwijdert een product uit de database
    public function destroy(Product $product)
    {
        // Delete het product
        $product->delete();

        // Ga terug naar het overzicht met een succesbericht
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

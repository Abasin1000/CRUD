<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Laat alle categorieën zien
    public function index()
    {
        // Haal alle categorieën op uit de database
        $categories = Category::all();
        // Stuur de categorieën naar de index view
        return view('categories.index', compact('categories'));
    }

    // Laat het formulier zien om een nieuwe categorie toe te voegen
    public function create()
    {
        return view('categories.create');
    }

    // Slaat een nieuwe categorie op in de database
    public function store(Request $request)
    {
        // Check of de ingevulde data klopt (valideren)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Maak de nieuwe categorie aan
        Category::create($validated);

        // Ga terug naar het overzicht met een succesbericht
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Laat 1 specifieke categorie zien
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Laat het formulier zien om een bestaande categorie te bewerken
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Slaat de aanpassingen op bij een bestaande categorie
    public function update(Request $request, Category $category)
    {
        // Valideer de ingevulde data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update de categorie in de database
        $category->update($validated);

        // Ga terug naar het overzicht met een succesbericht
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Verwijdert een categorie uit de database
    public function destroy(Category $category)
    {
        // Delete de categorie
        $category->delete();

        // Ga terug naar het overzicht met een succesbericht
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

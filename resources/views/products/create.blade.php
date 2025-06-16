@extends('layouts.app')

@section('content')
<h1>Nieuw product aanmaken</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <label for="category_id">Categorie:</label>
    <select name="category_id" id="category_id" required>
        <option value="">-- Kies een categorie --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label for="name">Productnaam:</label>
    <input type="text" name="name" id="name" required>
    <br><br>

    <label for="description">Beschrijving:</label>
    <textarea name="description" id="description"></textarea>
    <br><br>

    <label for="price">Prijs:</label>
    <input type="number" step="0.01" name="price" id="price" required>
    <br><br>

    <label for="stock">Voorraad:</label>
    <input type="number" name="stock" id="stock" value="0" required>
    <br><br>

    <button type="submit">Opslaan</button>
</form>
@endsection

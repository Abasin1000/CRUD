@extends('layouts.app')

@section('content')
    <h1>Nieuw Product Aanmaken</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label for="category_id">Categorie:</label>
        <select name="category_id" id="category_id" required>
            <option value="">-- Kies een categorie --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br>

        <label for="name">Naam:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br>

        <label for="description">Omschrijving:</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>

        <br>

        <label for="price">Prijs:</label>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        @error('price')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br>

        <label for="stock">Voorraad:</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" required>
        @error('stock')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <br>

        <button type="submit">Product Opslaan</button>
    </form>
@endsection

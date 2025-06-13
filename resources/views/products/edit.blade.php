@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product bewerken</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div>
            <label for="description">Beschrijving:</label>
            <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="price">Prijs:</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div>
            <label for="stock">Voorraad:</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <div>
            <label for="category_id">Categorie:</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- Kies een categorie --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>
        <button type="submit">Opslaan</button>
    </form>
</div>
@endsection

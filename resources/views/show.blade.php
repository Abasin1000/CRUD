@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">{{ $product->name }}</h3>
            <p class="card-text"><strong>Beschrijving:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Prijs:</strong> €{{ number_format($product->price, 2) }}</p>
            <p class="card-text"><strong>Categorie:</strong> {{ $product->category->name }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">← Terug naar overzicht</a>
</div>
@endsection

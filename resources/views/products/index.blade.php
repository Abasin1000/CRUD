@extends('layouts.app')

@section('content')
    <h1>Producten</h1>

    <a href="{{ route('products.create') }}">Nieuw product toevoegen</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong> - €{{ $product->price }}<br>
                Categorie: {{ $product->category->name ?? 'Geen' }}<br>
                <a href="{{ route('products.edit', $product->id) }}">✏️ Bewerken</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> Verwijderen</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

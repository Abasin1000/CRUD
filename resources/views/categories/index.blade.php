@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    {{-- Knop om een nieuwe categorie toe te voegen --}}
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>

    {{-- Feedback-bericht als er iets gelukt is, bijvoorbeeld na het toevoegen/bewerken --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Overzicht van alle categorieën in een tabel --}}
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        {{-- Loop door alle categorieën heen --}}
        @foreach($categories as $category)
            <tr>
                {{-- Naam en beschrijving laten zien --}}
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    {{-- Link om categorie te bekijken --}}
                    <a href="{{ route('categories.show', $category->id) }}">View</a> |
                    {{-- Link om categorie te bewerken --}}
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                    {{-- Formulier om categorie te verwijderen (met beveiliging) --}}
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Nieuwe Categorie Aanmaken</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="description">Beschrijving:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit">Opslaan</button>
        <a href="{{ route('categories.index') }}">Terug</a>
    </form>
@endsection

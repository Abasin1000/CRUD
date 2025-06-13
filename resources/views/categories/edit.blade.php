@extends('layouts.app')


@section('content')
<h1>Edit Category</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name) }}" required>

    <label>Description</label>
    <textarea name="description">{{ old('description', $category->description) }}</textarea>

    <button type="submit">Update</button>
</form>

<a href="{{ route('categories.index') }}">Back to Categories</a>
@endsection

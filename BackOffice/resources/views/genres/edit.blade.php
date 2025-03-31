@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Genere</h1>

    <!-- Form per modificare il genere -->
    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome del Genere</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $genre->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna Genere</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection

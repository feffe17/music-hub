@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Modifica Album</h1>

    <!-- Form per la modifica dell'album -->
    <form action="{{ route('albums.update', $album->id) }}" method="POST">
        @csrf
        @method('PUT')  

        <div class="form-group">
            <label for="name" class="form-label fw-bold">Nome Album</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $album->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="year" class="form-label fw-bold">Anno di Uscita</label>
            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $album->year) }}" required>
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="artist" class="form-label fw-bold">Artista</label>
            <input type="text" class="form-control @error('artist') is-invalid @enderror" id="artist" name="artist" value="{{ old('artist', $album->artist) }}" required>
            @error('artist')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label fw-bold">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $album->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Aggiorna Album</button>
    </form>
</div>
@endsection

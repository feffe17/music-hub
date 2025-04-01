@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-3">Modifica Canzone</h1>

    <!-- Form per la modifica della canzone -->
    <form action="{{ route('songs.update', $song->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Titolo della canzone -->
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $song->title }}" required>
        </div>

        <!-- Artista -->
        <div class="mb-3">
            <label for="artist" class="form-label fw-bold">Artista</label>
            <input type="text" class="form-control" id="artist" name="artist" value="{{ $song->artist }}" required>
        </div>

        <!-- Album -->
        <div class="mb-3">
            <label for="album_id" class="form-label fw-bold">Album</label>
            <select class="form-control" id="album_id" name="album_id">
                <option value="">Seleziona un album</option>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" {{ $song->album_id == $album->id ? 'selected' : '' }}>
                        {{ $album->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Genere -->
        <div class="mb-3">
            <label for="genre_id" class="form-label fw-bold">Genere</label>
            <select class="form-control" id="genre_id" name="genre_id">
                <option value="">Seleziona un genere</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $song->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Link YouTube-->
        <div class="mb-3">
            <label for="youtube_link" class="form-label fw-bold">Link YouTube</label>
            <input type="url" class="form-control" id="youtube_link" name="youtube_link"
           value="{{ old('youtube_link', $song->youtube_link) }}" placeholder="YouTube Link">   
        </div>

        <!-- Link Spotify -->
        <div class="mb-3">
            <label for="spotify_link" class="form-label fw-bold">Link Spotify</label>
            <input type="url" class="form-control" id="spotify_link" name="spotify_link"
            value="{{ old('spotify_link', $song->spotify_link) }}" placeholder="Spotify Link">
        </div>
        

        <!-- Pulsanti -->
        <button type="submit" class="btn btn-success">Aggiorna Canzone</button>
        <a href="{{ route('songs.index') }}" class="btn btn-secondary">Annulla</a>

    </form>
</div>

@endsection

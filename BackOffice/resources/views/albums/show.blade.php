@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dettagli Album</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $album->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Anno di Uscita:</strong> {{ $album->year }}</p>
            <p><strong>Artista:</strong> {{ $album->artist }}</p>
            <p><strong>Descrizione:</strong> {{ $album->description ?? 'Nessuna descrizione disponibile.' }}</p>

            <!-- Aggiungi un pulsante per tornare alla lista degli album -->
            <a href="{{ route('albums.index') }}" class="btn btn-secondary mt-3">Torna alla Lista</a>

            <!-- Aggiungi eventuali pulsanti per modificare o eliminare -->
            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning mt-3">Modifica Album</a>
            <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Sei sicuro di voler eliminare questo album?')">Elimina Album</button>
            </form>
        </div>
    </div>
</div>
@endsection

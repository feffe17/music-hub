@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Gestione Canzoni</h1>

    <!-- Pulsante per aggiungere una nuova canzone -->
    <a href="{{ route('songs.create') }}" class="btn btn-primary mb-3">Aggiungi Nuova Canzone</a>

    <!-- Tabella con le canzoni -->
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Titolo</th>
                <th>Artista</th>
                <th>Album</th>
                <th>Genere</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
                <tr>
                    {{-- <td>{{ $song->id }}</td> --}}
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->artist }}</td>
                    <td>{{ $song->album ? $song->album->name : '-' }}</td>
                    <td>{{ $song->genre ? $song->genre->name : '-' }}</td>
                    <td>
                        <!-- Modifica -->
                        <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-warning btn-sm">Modifica</a>

                        <!-- Elimina -->
                        <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare questa canzone?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

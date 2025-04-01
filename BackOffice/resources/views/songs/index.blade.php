@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Gestione Canzoni</h1>

    <div class="d-flex justify-content-between row">
        <!-- searchbar -->
        <form action="{{ route('songs.index') }}" method="GET" class="mb-3 col-12 col-md-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cerca per titolo..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cerca</button>
                <a href="{{ route('songs.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
        
        <!-- Pulsante per aggiungere una nuova canzone -->
        <a href="{{ route('songs.create') }}" class="btn btn-primary mb-3 col-12 col-md-3">Aggiungi Nuova Canzone</a>

    </div>


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
                        <!-- Visualizza -->
                        <a href="{{ route('songs.show', $song->id) }}" class="btn btn-info btn-sm">Visualizza</a>

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

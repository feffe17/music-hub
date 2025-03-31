@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestione Album</h1>

    <!-- Pulsante per creare un nuovo album -->
    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Aggiungi Nuovo Album</a>

    <!-- Tabella che visualizza gli album -->
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Nome</th>
                <th>Anno</th>
                <th>Artista</th>
                <th>Azione</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
                    {{-- <td>{{ $album->id }}</td> --}}
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->year }}</td>
                    <td>{{ $album->artist }}</td>
                    <td>
                        <!-- Visualizza -->
                            <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm">Visualizza</a>
                        
                        <!-- Modifica -->
                        <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-sm">Modifica</a>

                        <!-- Elimina -->
                        <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo album?');">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

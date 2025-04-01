@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestione Album</h1>

    <div class="d-flex justify-content-between row">
        <!-- searchbar -->
        <form action="{{ route('albums.index') }}" method="GET" class="mb-3 col-12 col-md-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ old('search', $search) }}" class="form-control" placeholder="Cerca album...">
                <button type="submit" class="btn btn-primary">Cerca</button>
                <a href="{{ route('albums.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- Pulsante per creare un nuovo album -->
        <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3 col-12 col-md-3 ">Aggiungi Nuovo Album</a>
    </div>



    <!-- Tabella che visualizza gli album -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Anno</th>
                <th>Artista</th>
                <th>Azione</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
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

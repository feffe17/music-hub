@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestione Generi</h1>

    <!-- Pulsante per creare un nuovo genere -->
    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Aggiungi Nuovo Genere</a>

    <!-- Tabella che visualizza i generi -->
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Nome</th>
                <th>Azione</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
                <tr>
                    {{-- <td>{{ $genre->id }}</td> --}}
                    <td>{{ $genre->name }}</td>
                    <td>
                        <!-- Modifica -->
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Modifica</a>
                        
                        <!-- Elimina -->
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Sei sicuro di voler eliminare questo genere? Perederai anche tutti gli album e le canzoni a esso associate');">
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

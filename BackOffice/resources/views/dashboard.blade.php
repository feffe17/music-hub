@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Benvenuto nella Dashboard Admin</h1>

        <!-- Opzioni per l'admin -->
        <div>
            {{-- <a href="{{ route('albums.index') }}">Gestisci Album</a><br>
            <a href="{{ route('songs.index') }}">Gestisci Canzoni</a><br>
            <a href="{{ route('genres.index') }}">Gestisci Generi</a><br> --}}
            <a href="album index">Gestisci Album</a><br>
            <a href="song index">Gestisci Canzoni</a><br>
            <a href="route index">Gestisci Generi</a><br>
        </div>
    </div>
@endsection

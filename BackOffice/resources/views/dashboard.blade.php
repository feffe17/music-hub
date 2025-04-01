@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="mb-4">Benvenuto nella Dashboard Admin</h1>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('albums.index') }}" class="btn btn-primary">Gestisci Album</a>
        <a href="{{ route('songs.index') }}" class="btn btn-success">Gestisci Canzoni</a>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Gestisci Generi</a>
    </div>
</div>
@endsection

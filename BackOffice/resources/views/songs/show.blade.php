@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dettagli Canzone</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $song->title }}</h2>
            <h4 class="card-subtitle mb-2 text-muted">Artista: {{ $song->artist }}</h4>

            @if($song->album)
                <p><strong>Album:</strong> {{ $song->album->name }} ({{ $song->album->year }})</p>
            @else
                <p><strong>Album:</strong> Nessun album</p>
            @endif

            <p><strong>Genere:</strong> {{ $song->genre->name }}</p>

            @if($song->release_date)
                <p><strong>Data di rilascio:</strong> {{ \Carbon\Carbon::parse($song->release_date)->format('d/m/Y') }}</p>
            @endif

            @if($song->youtube_link)
                <p>
                    <strong>Ascolta su YouTube:</strong> 
                    <a href="{{ $song->youtube_link }}" target="_blank" class="btn btn-danger btn-sm">YouTube</a>
                </p>
            @endif

            @if($song->spotify_link)
                <p>
                    <strong>Ascolta su Spotify:</strong> 
                    <a href="{{ $song->spotify_link }}" target="_blank" class="btn btn-success btn-sm">Spotify</a>
                </p>
            @endif

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Torna indietro</a>
        </div>
    </div>
</div>
@endsection

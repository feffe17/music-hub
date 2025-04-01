@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Crea Nuovo Genere</h1>

    <!-- Form per creare un nuovo genere -->
    <form action="{{ route('genres.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nome del Genere</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crea Genere</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection

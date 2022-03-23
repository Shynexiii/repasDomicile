@extends('layouts.master')

@section('pageTitle', 'Modifier un plat')

@section('content')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('plats.update', $plat->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $plat->nom }}" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" cols="30" rows="5" class="form-control">{{ $plat->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" name="prix" class="form-control" value="{{ $plat->prix }}" />
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" value="{{ $plat->image }}" />
            </div>
            <div class="form-group">
                <label for="jour" class="form-label">Jour de disponibilité</label>
                <select class="form-select" name="jour" aria-label="Default select example">
                    <option disabled>Choisissez un jour</option>
                    @foreach ($jours as $key => $jour)
                    <option {{ $plat->jour == $key ? 'selected' : ''}} value="{{ $key }}">{{ $jour }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                Valider
            </button>
        </form>
    </div>
</div>

@endsection

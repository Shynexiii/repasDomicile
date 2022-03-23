@extends('layouts.master')

@section('pageTitle', 'Ajouter un plat')

@section('content')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('plats.store') }}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" value="{{ old('description') }}" cols="30" rows="5"
                    class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" name="prix" value="{{ old('prix') }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" value="{{ old('image') }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="jour" class="form-label">Jour de disponibilité</label>
                <select class="form-select" name="jour" aria-label="Default select example">
                    <option disabled>Choisissez un jour</option>
                    @foreach ($jours as $key => $jour)
                    <option value="{{ $key }}">{{ $jour }}</option>
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

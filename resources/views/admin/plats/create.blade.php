@extends('layouts.master')

@section('pageTitle', 'Ajouter un plat')

@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('plats.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" name="prix" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
            </form>
        </div>
    </div>

@endsection

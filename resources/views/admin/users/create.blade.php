@extends('layouts.master')

@section('pageTitle', 'Ajouter un nouveau client')

@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('plats.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom et prénom</label>
                    <input type="text" name="nom" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="text" name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control" />
                </div>
                {{-- <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" class="form-control" />
                </div> --}}
                <button type="submit" class="btn btn-primary">
                    Ajouter
                </button>
            </form>
        </div>
    </div>

@endsection

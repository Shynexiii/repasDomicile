@extends('layouts.master')

@section('pageTitle', 'Ajouter un nouveau client')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="last_name">Nom</label>
                <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="first_name">Prénom</label>
                <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>
        </form>
    </div>
</div>

@endsection

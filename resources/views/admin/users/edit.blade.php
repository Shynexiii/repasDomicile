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
                    <label for="nom">Nom et prénom</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"  />
                </div>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control"  />
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control"  />
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"  />
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

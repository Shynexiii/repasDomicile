@extends('layouts.front')

@section('title', 'Mon profil')

@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('POST')
                    <fieldset>
                        <legend>Informations personnelles</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNom">Nom</label>
                                <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                                    id="inputNom" name="last_name" value="{{ $user->last_name }}" placeholder="Nom">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPrenom">Prénom</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    id="inputPrenom" name="first_name" value="{{ $user->first_name }}"
                                    placeholder="Prenom">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="inputEmail" name="email" value="{{ $user->email }}" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone">Numéro de téléphone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="inputPhone" name="phone" value="{{ $user->phone }}"
                                    placeholder="Numéro de téléphone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Enregistrer</button>
                    </fieldset>
                </form>
                <form class="mt-3" action="{{ route('user.updatePassword', $user) }}" method="POST">
                    @csrf
                    @method('POST')
                    <fieldset>
                        <legend>Mot de passe</legend>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPassword">Mot de passe actuel</label>
                                <input type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    id="inputPassword" name="current_password" placeholder="Mot de passe">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword">Nouveau mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="inputPassword" name="password" placeholder="Mot de passe">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="inputPassword"
                                    name="password_confirmation" placeholder="Confirmer le mot de passe">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Enregistrer</button>
                    </fieldset>
                </form>
                <form class="mt-3" action="{{ route('user.update_adresse', $user) }}" method="POST">
                    @csrf
                    @method('POST')
                    <fieldset>
                        <legend>Adresse</legend>
                        <div class="form-group">
                            <label for="inputAdresse">Adresse</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="inputAdresse"
                                name="nom" placeholder="1234 avenue François" value="{{ $user->adresse->nom ?? '' }}">
                            @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputCity">Ville</label>
                                <input type="text" class="form-control @error('ville') is-invalid @enderror"
                                    id="inputCity" name="ville" value="{{ $user->adresse->ville ?? '' }}"
                                    placeholder="Paris">
                                @error('ville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCode_postal">Code postal</label>
                                <input type="text" class="form-control @error('code_postal') is-invalid @enderror"
                                    id="inputCode_postal" name="code_postal"
                                    value="{{ $user->adresse->code_postal ?? '' }}" placeholder="75001">
                                @error('code_postal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Enregistrer</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

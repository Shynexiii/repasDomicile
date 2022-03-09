@extends('layouts.front')

@section('title', 'Paiement réussi')

@section('content')
<div class="d-flex justify-content-center mb-5 flex-column align-items-center">
    <img src="{{ asset('images/correct.png') }}" alt="" height="150px" width="150px">
    <span class="font-weight-bold"></span>
    <h1>Merci pour votre commande!</h1>
    <p>
        Si vous avez des questions, veuillez envoyer un e-mail à
        <a href="mailto:repasadomicile@evry.fr">repasadomicile@evry.fr</a>.
    </p>
    <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-success" type="button" href="{{ route('front.index') }}">Revenir a l'accueil</a>
        {{-- <button class="btn btn-secondary" type="button" class="btn btn-secondary" type="button">Facture</button>
        --}}
        {{-- <a class="btn btn-secondary" type="button" href="{{ route('') }}">Facture</a> --}}
    </div>
</div>
@endsection

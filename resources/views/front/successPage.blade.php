@extends('layouts.front')

@section('title', 'Paiement réussi')

@section('content')
<div class="d-flex justify-content-center mb-5 flex-column align-items-center">
    <img src="{{ asset('images/correct.png') }}" alt="">
    <span class="font-weight-bold"></span>
    <h1>Merci pour votre commande!</h1>
    <p>
        Si vous avez des questions, veuillez envoyer un e-mail à
        <a href="mailto:repasadomicile@evry.fr">repasadomicile@evry.fr</a>.
    </p>
</div>
@endsection

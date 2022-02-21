@extends('layouts.front')

@section('title', 'Paiement réussi')

@section('content')
    <div class="d-flex justify-content-center mb-5 flex-column align-items-center">
        <img src="{{ asset('images/correct.png') }}" alt="">
        <span class="font-weight-bold"></span>
        <h1>Thanks for your order!</h1>
        <p>
            We appreciate your business!
            If you have any questions, please email
            <a href="mailto:orders@example.com">orders@example.com</a>.
        </p>
    </div>
@endsection

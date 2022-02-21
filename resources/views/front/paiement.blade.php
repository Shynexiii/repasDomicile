@extends('layouts.front')

@section('title', 'Paiement')

@section('head_script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection


@section('content')
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit">Checkout</button>
    </form>
@endsection

@section('script')
    <script>

    </script>
@endsection

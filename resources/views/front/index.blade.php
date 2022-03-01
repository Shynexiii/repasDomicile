@extends('layouts.front')

@section('content')
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
    @foreach ($plats as $plat)
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Sale badge-->
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
            </div>
            <!-- Product image-->
            <img class="card-img-top" src="{{ $plat->image }}" alt="{{ $plat->nom }}" />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <p class="">{{ $plat->nom }}</p>
                    <p class="text-muted">{{ Str::replace(',', ' - ', $plat->description) }} </p>
                    <!-- Product reviews-->
                    <div class="d-flex justify-content-center small text-warning mb-2">
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                    </div>
                    <p class="lead m-0">{{ $plat->prix }} €</p>
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                    <form action="{{ route('cart.add', $plat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-dark d-block mx-auto">Ajouter au panier</button>
                    </form>
                    <form action="{{ route('preference.store', $plat->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        @auth
                        <button type="submit" class="btn btn-outline-danger mt-2 d-block mx-auto"
                            @foreach(auth()->user()->plats as $item) @if($plat->id == $item->id) disabled @endif
                            @endforeach
                            id="wishlist_btn"
                            value="{{ $plat->id }}">Ajouter à mes préférences</button>
                        @endauth

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@extends('layouts.front')

@section('title', 'Accueil')

@section('content')
@auth
@if ($prefences->isNotEmpty())
<h3>Mes plats préférés</h3>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
    @foreach ($prefences as $prefence)
    <div class="col mb-5 ">
        <div class="card h-100">
            <img class="card-img-top" src="{{ $prefence->image }}" alt="{{ $prefence->nom }}" />
            <div class="card-body p-4">
                <div class="text-center">
                    <p class="">{{ $prefence->nom }}</p>
                    <p class="text-muted">{{ Str::replace(',', ' - ', $prefence->description) }} </p>
                    <div class="d-flex justify-content-center small text-warning mb-2">
                        @for ($i = 1; $i <= $prefence->avis->pluck('note')->avg(); $i++)
                            <a href="{{ route('avis.show',$prefence->id) }}"><i class="fa fa-star text-warning"></i></a>
                            @endfor
                    </div>
                    <p class="lead m-0">{{ $prefence->prix }} €</p>
                </div>

            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                    <div class="btn-group">
                        <form action="{{ route('cart.add', $plat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-outline-dark mr-1">Ajouter au
                                panier</button>
                        </form>
                        <form action="{{ route('preference.store2', $prefence->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            @auth
                            <button type="submit" class="btn btn-outline-danger" @foreach(auth()->user()->plats
                                as $item) @if($prefence->id == $item->id) @endif
                                @endforeach
                                id="wishlist_btn"
                                value="{{ $prefence->id }}"><i class="bi bi-heart"></i></button>
                            @endauth
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endauth


<h3 class="mt-3">Plats du jour</h3>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
    @foreach ($plats as $plat)
    <div class="col mb-5">
        <div class="card h-100">
            <img class="card-img-top" src="{{ $plat->image }}" alt="{{ $plat->nom }}" />
            <div class="card-body p-4">
                <div class="text-center">
                    <p class="">{{ $plat->nom }}</p>
                    <p class="text-muted">{{ Str::replace(',', ' - ', $plat->description) }} </p>
                    <div class="d-flex justify-content-center small text-warning mb-2">
                        @for ($i = 1; $i <= $plat->avis->pluck('note')->avg(); $i++)
                            <a href="{{ route('avis.show',$plat->id) }}"><i class="fa fa-star text-warning"></i></a>
                            @endfor
                    </div>
                    <p class="lead m-0">{{ $plat->prix }} €</p>
                </div>
            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                    <div class="btn-group">
                        <form action="{{ route('cart.add', $plat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-outline-dark mr-1">Ajouter au
                                panier</button>
                        </form>
                        <form action="{{ route('preference.store', $plat->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            @auth
                            <button type="submit" class="btn btn-outline-danger" @foreach(auth()->user()->plats
                                as $item) @if($plat->id == $item->id) disabled @endif
                                @endforeach
                                id="wishlist_btn"
                                value="{{ $plat->id }}"><i class="bi bi-heart"></i></button>
                            @endauth
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

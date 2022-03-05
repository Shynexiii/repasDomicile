@extends('layouts.front')

@section('title', 'Ma commande')

@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Image</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prix unitaire</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix total</th>
                                @if ($commandes->status == "Livrée")
                                <th scope="col">Laisser un commentaire</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes->plats as $plat)
                            <tr class="text-center ">
                                <td class="align-middle "> <img class="img-fluid rounded-3" src="{{ $plat->image }}"
                                        alt="{{ $plat->nom }}" width="100" height="100">
                                </td>
                                <td class="align-middle">{{ $plat->nom }}</td>
                                <td class="align-middle">{{ $plat->prix }}</td>
                                <td class="align-middle">{{ $plat->getOriginal()['pivot_quantite'] }}</td>
                                <td class="align-middle">{{ $plat->prix * $plat->getOriginal()['pivot_quantite'] }}
                                </td>
                                @if ($commandes->status == "Livrée")
                                <td class="align-middle"><a href="{{ route('avis.show', $plat->id) }}"><i
                                            class="bi bi-pencil-square text-primary"></i></a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

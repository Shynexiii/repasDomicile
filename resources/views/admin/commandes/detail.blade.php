@extends('layouts.master')

@section('pageTitle', 'Détail')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    {{-- <caption>Total : </caption> --}}
                    <tr class="text-center">
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $plat)
                    <tr class="text-center ">
                        <td class="align-middle "> <img class="img-fluid rounded-3" src="{{ $plat->image }}"
                                alt="{{ $plat->nom }}" width="100" height="100">
                        </td>
                        <td class="align-middle">{{ $plat->nom }}</td>
                        <td class="align-middle">{{ $plat->prix }}</td>
                        <td class="align-middle">{{ $plat->getOriginal()['pivot_quantite'] }}</td>
                        <td class="align-middle">{{ $plat->prix * $plat->getOriginal()['pivot_quantite'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

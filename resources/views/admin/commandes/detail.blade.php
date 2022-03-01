@extends('layouts.master')

@section('pageTitle', 'Détail')

@section('content')
<div class="col">
    <div class="row">
        <div class="col-md-8">
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Mettre à jour le status
                </div>
                <div class="card-body">
                    <form action="{{ route('commandes.update', $commandes->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select class="form-select" aria-label="Default select example" name="status">
                            @if ($commandes->status === "En cours" )
                            <option value="En cours" selected>En cours</option>
                            <option value="Livrée">Livrée</option>
                            @else
                            <option value="En cours">En cours</option>
                            <option value="Livrée" selected>Livrée</option>
                            @endif
                        </select>
                        <button class="btn btn-outline-secondary mt-3 float-end">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

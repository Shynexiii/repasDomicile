@extends('layouts.master')

@section('pageTitle', 'Commandes')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="myTable">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Numéro</th>
                        <th scope="col">Client</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Status</th>
                        <th scope="col">Adresse de livraison</th>
                        <th scope="col">Mode de paiement</th>
                        <th scope="col">Détail</th>
                        <th scope="col">Facture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                    <tr class="text-center ">
                        <td class="align-middle">{{ $commande->id }}</td>
                        <td class="align-middle">{{ $commande->user->first_name }} {{ $commande->user->last_name }}</td>
                        <td class="align-middle">{{ $commande->montant }}</td>
                        <td class="align-middle"><span
                                class="align-middle badge bg-{{ $commande->status == 'En cours' ? 'warning' : 'success' }} fs-6">{{
                                $commande->status }}</span></td>
                        <td class="align-middle">{{ $commande->adresse->nom }} {{ $commande->adresse->ville }} {{
                            $commande->adresse->code_postal }}</td>
                        <td class="align-middle">{{ $commande->mode_paiement }}</td>
                        <td>
                            <a href="{{ route('commandes.show', $commande->id) }}" class="btn text-secondary btn-lg"><i
                                    class="bi bi-eye-fill"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('commandes.facture.index', $commande->id) }}" class="btn text-secondary"
                                target="_blank" rel="noopener noreferrer"><i class="bi bi-download"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

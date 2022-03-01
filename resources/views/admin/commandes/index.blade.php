@extends('layouts.master')

@section('pageTitle', 'Commandes')

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Ajouter un client</a>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Numéro</th>
                        <th scope="col">Client</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Status</th>
                        <th scope="col">Adresse de livraison</th>
                        <th scope="col">Mode de paiement</th>
                        <th scope="col">Détail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                    <tr class="text-center ">
                        <td class="align-middle">{{ $commande->id }}</td>
                        <td class="align-middle">{{ $commande->user->first_name }} {{ $commande->user->last_name }}</td>
                        <td class="align-middle">{{ $commande->montant }}</td>
                        <td class="align-middle">{{ $commande->status }}</td>
                        <td class="align-middle">{{ $commande->adresse }}</td>
                        <td class="align-middle">{{ $commande->mode_paiement }}</td>
                        <td>
                            <form action="{{ route('commandes.show', $commande->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn text-secondary btn-lg"><i
                                        class="bi bi-eye-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

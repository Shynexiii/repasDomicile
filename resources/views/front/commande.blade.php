@extends('layouts.front')

@section('title', 'Mes commandes')

@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                @if ($commandes->isNotEmpty())
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Numéro</th>
                                <th scope="col" class="text-center">Montant</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col">Détail</th>
                                <th scope="col">Facture</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                            <tr>
                                <td class="text-center">{{ $commande->id }}</td>
                                <td class="text-center">{{ $commande->montant }} €</td>
                                <td class="text-center">{{ $commande->status }}</td>
                                <td>
                                    <a href="{{ route('user.commande_detail', $commande->id) }}"
                                        class="btn text-secondary"><i class="bi bi-eye-fill"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('facture.index', $commande->id) }}" class="btn text-secondary"
                                        target="_blank" rel="noopener noreferrer"><i class="bi bi-download"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h3 class="text-center">Pas de commande</h3>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

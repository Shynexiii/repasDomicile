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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                            <tr>
                                <td class="text-center">{{ $commande->id }}</td>
                                <td class="text-center">{{ $commande->montant }} €</td>
                                <td class="text-center">{{ $commande->status }}</td>
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

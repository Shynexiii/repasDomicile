@extends('layouts.master')

@section('pageTitle', 'Accueil')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $users->count() }}</h3>
                <p>Clients</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">Voir plus <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $platCount }}</h3>
                <p>Plats</p>
            </div>
            <div class="icon">
                <i class="fas fa-concierge-bell"></i>
            </div>
            <a href="{{ route('plats.index') }}" class="small-box-footer">Voir plus <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $commandes->count() }}</h3>
                <p>Commandes</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="{{ route('commandes.index') }}" class="small-box-footer">Voir plus <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $montantTotal }} €</h3>
                <p>Revenues</p>
            </div>
            <div class="icon">
                <i class="fas fa-euro-sign"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas fa-hashtag"></i></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Les ventes </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div id="chart" style="height: 300px;"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Les commandes récentes</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Numéro</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Status</th>
                                <th scope="col">Fait</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                            <tr class="text-center">
                                <th scope="row">{{ $commande->id }}</th>
                                <td>{{ $commande->montant }}</td>
                                <td>{{ $commande->status }}</td>
                                <td>{{ $commande->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Les dernières inscriptions</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Numéro</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">adresse</th>
                                <th scope="col">Inscrit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users->take(3) as $user)
                            <tr class="text-center">
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->adresse->nom ?? '' }}, {{ $user->adresse->ville ?? '' }}, {{
                                    $user->adresse->code_postal ?? '' }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('plat_chart')",
      hooks: new ChartisanHooks()
    .beginAtZero()
    .colors()
    .borderColors()
    .datasets([{ type: 'bar', fill: false }]),
    });
</script>
@endpush

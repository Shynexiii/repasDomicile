@extends('layouts.master')

@section('pageTitle', 'Accueil')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $userCount }}</h3>
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
                <h3>{{ $commandeCount }}</h3>
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
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Area Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="areaChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>

        </div>


        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="donutChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

        </div>
    </div>
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Area Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="areaChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>

        </div>


        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="donutChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

        </div>
    </div>
</div>

@endsection

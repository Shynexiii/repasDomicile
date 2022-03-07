@extends('layouts.master')

@section('pageTitle', 'Plats')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('plats.create') }}" class="btn btn-primary float-end">Ajouter un plat</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">prix</th>
                    <th scope="col">Jour</th>
                    <th scope="col" style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plats as $plat)
                <tr>
                    <th scope="row">{{ $plat->id }}</th>
                    <td>{{ $plat->nom }}</td>
                    <td>{{ $plat->description }}</td>
                    <td>{{ $plat->prix }} €</td>
                    <td>
                        @foreach ($jours as $key => $jour)
                        @if ( $plat->jour == $key)
                        {{ $jour }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <div class="d-flex">
                            {{-- <a href="{{ route('plats.show', $plat->id) }}"
                                class="btn btn-info btn-sm me-2">Apeçu</a> --}}
                            <a href="{{ route('plats.edit', $plat->id) }}" class="btn btn-warning btn-sm">modifier</a>
                            <form action="{{ route('plats.destroy', $plat->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

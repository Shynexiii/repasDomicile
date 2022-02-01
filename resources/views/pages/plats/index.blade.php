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
                                <div class="d-flex">
                                    <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                                        data-bs-target="#apercuPlatModal">Apeçu</button>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modifierPlatModal">modifier</button>
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

    <!-- Modal Ajouter un plat -->
    <div class="modal fade" id="apercuPlatModal" tabindex="-1" aria-labelledby="apercuPlatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="apercuPlatModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal Ajouter un plat -->

    <!-- Modal modifier un plat -->
    <div class="modal fade" id="modifierPlatModal" tabindex="-1" aria-labelledby="modifierPlatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifierPlatModalLabel">Modifier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('plats.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="text" name="prix" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" name="image" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Valider
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal modifier un plat -->

@endsection

@extends('layouts.master')

@section('pageTitle', 'Clients')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Ajouter un client</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom & prénom</th>
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Role</th>
                    <th scope="col" style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td></td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm me-2">Apeçu</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">modifier</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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

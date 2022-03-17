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
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Role</th>
                    <th scope="col" style="width: 15%" class="text-center align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="d-flex">
                            {{-- <a href="{{ route('users.show', $user->id) }}"
                                class="btn btn-info btn-sm me-2">Apeçu</a> --}}
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="btn btn-warning btn-sm d-flex justify-content-center">modifier</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="col-sm d-flex justify-content-center">
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

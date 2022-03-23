@extends('layouts.master')

@section('pageTitle', 'Avis')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="myTable">
                <thead>
                    <tr class="">
                        <th scope="col">Numéro</th>
                        <th scope="col">Client</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($avis as $item)
                    <tr class="">
                        <td class="align-middle">{{ $item->id }}</td>
                        <td class="align-middle">{{ $item->user->first_name }}</td>
                        <td class="align-middle">{{ $item->commentaire }}</td>
                        <td class="align-middle">{{ $item->note }} / 4</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

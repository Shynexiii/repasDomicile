@extends('layouts.front')

@section('title', 'Mes préférences')

@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                @if ($plats->isNotEmpty())
                <div class="table-responsive mt-3">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Jour</th>
                                <th class="text-center">Prix</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plats as $plat)
                            <tr>
                                <td class="col-md-2 text-center "> <img src="{{ $plat->image }}"
                                        class="img-fluid rounded-3" alt="{{ $plat->nom }}">
                                </td>
                                <td class="text-center align-middle">{{ $plat->nom }}</td>
                                <td class="text-center align-middle">
                                    @foreach ($jours as $key => $jour)
                                    @if ( $plat->jour == $key)
                                    {{ $jour }}
                                    @endif
                                    @endforeach
                                </td>
                                <td class="text-center align-middle">{{ $plat->prix }}</td>
                                <td class="col-md-1 col-lg-1 col-xl-1 text-center align-middle">
                                    <form action="{{ route('preference.delete', $plat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger"><i
                                                class="fas fa-trash fa-lg"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h3 class="text-center">Pas de préférences</h3>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection

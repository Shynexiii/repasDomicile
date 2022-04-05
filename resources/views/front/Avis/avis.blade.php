@extends('layouts.front')

@section('title', 'Les commentaires')

@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-6">
                @if ($plat->avis->isEmpty())
                <h3 class="text-center">Aucun avis</h3>
                @else
                <h3>Les commentaires</h3>
                @foreach ($plat->avis as $avis)
                <div class="card bg-light p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center">
                            <span>
                                <small class="font-weight-bold text-primary">{{ $avis->user->last_name }} {{
                                    $avis->user->first_name }}</small><br>
                                <small class="font-weight-bold">{{ $avis->commentaire }}</small>
                            </span>
                        </div>
                        <div class="icons align-items-center">
                            @for ($i = 1; $i <= $avis->note; $i++)
                                <i class="fa fa-star text-warning"></i>
                                @endfor
                        </div>
                    </div>
                    @if (auth()->user()->id == $avis->user->id)
                    <div class="d-flex justify-content-between mt-2 align-items-center">
                        <a href="{{ route('avis.destroy',$avis) }}"
                            class="text-danger text-decoration-none">Supprimer</a>
                    </div>
                    @endif
                </div>
                @endforeach

                @endif

                @auth
                @if ($canCommented)
                <div class="mt-5">
                    <h3>Laisser un avis</h3>
                    <form action="{{ route('avis.store', $plat) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Votre note</label>
                            <select class="form-select" name="note" aria-label="Default select example">
                                <option value="0">Choisissez une note<span class="fa fa-star checked"></span>
                                </option>
                                @for ($i = 1; $i <= 4; $i++) <option value="{{ $i }}">{{ $i }} / 4</option>

                                    @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Votre commentaire</label>
                            <textarea class="form-control" name="commentaire" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Un commentaire"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary float-end">Enregistrer</button>
                    </form>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection

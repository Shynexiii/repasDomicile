@extends('layouts.front')

@section('title', 'Panier')

@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-">
                @if (Cart::count() <= 0) <h3 class="text-center">Votre panier est vide</h3>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Image</th>
                                    <th class="text-center" scope="col">Nom</th>
                                    <th class="text-center" scope="col">jour</th>
                                    <th class="text-center" scope="col">Prix unitaire</th>
                                    <th class="text-center" scope="col">Quantité</th>
                                    <th class="text-center" scope="col">Prix total</th>
                                    <th class="text-center" scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                <tr>
                                    <td class="col-md-2 text-center "> <img src="{{ $cart->options->image }}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </td>
                                    <td>
                                        <p class="text-center align-middle">
                                        <h5>{{ $cart->name }}</h5>
                                        <p>{{ $cart->options->description }} </p>
                                        </p>
                                    </td>
                                    <td class="text-center align-middle">
                                        @foreach ($jours as $key => $jour)
                                        @if ($cart->model->jour == $key)
                                        <h5 class="mb-0">{{ $jour }}</h5>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center align-middle">
                                        <h5 class="mb-0">{{ $cart->price }} € </h5>
                                    </td>
                                    <td class="col-md-2 align-middle"><select id="qty" class="custom-select"
                                            data-id="{{ $cart->rowId }}">
                                            @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ ($i==$cart->
                                                qty)
                                                ?
                                                'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                        </select></td>
                                    <td class="text-center align-middle">
                                        <h5 class="mb-0">{{ $cart->price * $cart->qty }} €</h5>
                                    </td>
                                    {{-- <td>{{ $cart->price * $cart->qty }}</td> --}}
                                    <td class="col-md-1 col-lg-1 col-xl-1 text-center align-middle">
                                        <form action="{{ route('cart.destroy', $cart->rowId) }}" method="POST">
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
                    <div class="table-responsive mt-3">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-end align-middle">
                                        <h4 class="">Total à payer : {{ Cart::priceTotal() }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('checkout') }}" method="POST" class="card-body">
                        @csrf
                        @method('POST')
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                        name="nom" value="{{ auth()->user()->adresse->nom ?? old('nom')}}"
                                        placeholder="9-11 Pl. du Colonel Fabien">
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputCity" class="form-label">Ville</label>
                                    <input type="text" class="form-control @error('ville') is-invalid @enderror"
                                        name="ville" value="{{ auth()->user()->adresse->ville ?? old('ville')}}"
                                        placeholder="Paris">
                                    @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control @error('code_postal') is-invalid @enderror"
                                        name="code_postal"
                                        value="{{ auth()->user()->adresse->code_postal ?? old('code_postal') }}"
                                        placeholder="75010">
                                    @error('code_postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card col-md-12">
                            {{-- <form action="{{ route('checkout') }}" method="POST" class="card-body">
                                @csrf
                                @method('POST') --}}
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Payer</button>
                            </form>
                        </div>
                        @endif
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
            let qty = document.querySelectorAll('#qty');
            Array.from(qty).forEach((element) => {
                element.addEventListener('change', function() {
                    let rowId = this.getAttribute('data-id');
                    let token = $('meta[name="csrf-token"]').attr('content');
                    let data = {
                        'qty': $(this).val()
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "patch",
                        url: "/cart/"+rowId,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            location.reload();
                        }
                    });
                });

            });

        });

</script>
@endsection

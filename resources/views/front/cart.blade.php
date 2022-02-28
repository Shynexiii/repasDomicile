@extends('layouts.front')

@section('title', 'Panier')

@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                @if (Cart::count() <= 0) <h3 class="text-center">Votre panier est vide</h3>
                    @else
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix unitaire</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix total</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                <tr>
                                    <td class="col-md-2 text-center "> <img src="{{ $cart->options->image }}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </td>
                                    <td>
                                        <p class=" align-middle">
                                        <h5>{{ $cart->name }}</h5>
                                        <p>{{ $cart->options->description }} </p>
                                        </p>
                                    </td>
                                    <td class="text-center align-middle">
                                        <h5 class="mb-0">{{ $cart->price }} € </h5>
                                    </td>
                                    <td class="col-md-2 align-middle"><select id="qty" class="custom-select"
                                            data-id="{{ $cart->rowId }}">
                                            @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{ ($i==$cart->qty) ?
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
                    <div class="card col-md-12">
                        <form action="{{ route('checkout') }}" method="GET" class="card-body">
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

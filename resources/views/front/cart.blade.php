@extends('layouts.front')

@section('title', 'Panier')

@section('content')
    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    @foreach ($carts as $cart)
                        {{-- {{ dd($carts->description) }} --}}
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ $cart->options->image }}" class="img-fluid rounded-3"
                                            alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $cart->name }}</p>
                                        <p><span class="text-muted">Description:
                                            </span>{{ $cart->options->description }} </p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <input id="form1" min="1" max="5" name="quantity" value="{{ $cart->qty }}"
                                            type="number" class="form-control form-control-sm" />

                                        <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">{{ $cart->price }} €</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <form action="{{ route('cart.destroy', $cart->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-danger"><i
                                                    class="fas fa-trash fa-lg"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="card mb-5 col-md-5 float-end">
                        <div class="card-body p-4">
                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="text-muted me-2">Prix Total:</span> <span
                                        class="lead fw-normal">{{ Cart::priceTotal() }}</span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="card col-md-12">
                        <form action="{{ route('checkout') }}" method="GET" class="card-body">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proceed to Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection

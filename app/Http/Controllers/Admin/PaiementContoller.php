<?php

namespace App\Http\Controllers\Admin;

use Stripe\Stripe;
use Illuminate\Support\Str;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller;
use App\Models\Commande;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaiementContoller extends Controller
{
    public function checkout()
    {
        $carts = Cart::content();
        foreach ($carts as $value) {
            $plat['line_items'][] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $value->name,
                    ],
                    'unit_amount' => $value->price * 100,
                ],
                'quantity' => $value->qty,
            ];
        }

        Stripe::setApiKey(
            'sk_test_51FQL8yEkhypZ4UaGoUsRDzxYPoAk2oCbGOqoAdRtcV9rYGx4oxBqdxm8uecwxb1MIUFWgaQxIFmC6OnfJFQsAtOW00YDE7bcYb'
        );
        $session = Session::create([
            $plat,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('cart.index'),
        ]);
        session()->put('client', $session->id);
        // $client_secret = $intent->client_secret;
        return redirect($session->url);
    }

    public function success()
    {
        $client = session('client');
        if ($client != null) {
            $cart = Cart::content();
            foreach ($cart as $value) {
                $id[] = $value->id;
                $quantite[] = $value->qty;
            }
            $commande = new Commande;
            $commande->montant = Cart::total();
            $commande->status = 'En cours';
            $commande->adresse = "Evry";
            $commande->mode_paiement = "Card";
            $commande->user()->associate(auth()->user());
            $commande->save();
            foreach (Cart::content() as $value) {
                $commande->plats()->attach($value->id, ['quantite' => $value->qty]);
            }
        }
        Cart::destroy();
        return view('front.successPage');
    }
}

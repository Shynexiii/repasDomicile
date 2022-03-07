<?php

namespace App\Http\Controllers\Admin;

use Stripe\Stripe;
use Stripe\Customer;
use App\Models\Commande;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaiementContoller extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:50',
            'code_postal' => 'required|digits:5',
        ]);
        if (auth()->user()->adresse->nom == null || auth()->user()->adresse->ville == null || auth()->user()->adresse->code_postal == null) {
            auth()->user()->adresse->nom = $request->input('nom');
            auth()->user()->adresse->ville = $request->input('ville');
            auth()->user()->adresse->code_postal = $request->input('code_postal');
            auth()->user()->adresse->save();
        }
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
            'customer_email' => auth()->user()->email,
            'mode' => 'payment',
            'locale' => 'fr',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('cart.index'),
        ]);

        session()->put('client', $session->id);
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
            $commande->adresse = auth()->user()->adresse->nom . ', ' . auth()->user()->adresse->ville . ', ' . auth()->user()->adresse->code_postal;
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

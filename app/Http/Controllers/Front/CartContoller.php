<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plat $plat)
    {
        // auth()->user()->adresse->nom = "aze";
        // dd(auth()->user()->adresse);
        $jours = [
            '0' => 'Tous les jours',
            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];

        $carts = Cart::content();
        return view('front.cart', compact('carts', 'jours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plat $plat)
    {

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($plat) {
            return $cartItem->id === $plat->id;
        });

        if ($duplicata->isNotEmpty()) {
            return redirect()->back()->with('error', 'Ce produit a déja été ajouté');
        }

        Cart::add($plat->id, $plat->nom, 1, $plat->prix, 0, ['description' => $plat->description, 'image' => $plat->image])->associate(Plat::class);
        return redirect()->back()->with('success', 'Le produit a bien été ajouté au panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function show(Plat $plat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function edit(Plat $plat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request['qty']);
        $request->session()->flash('success', 'La quantité du produit est à ' . $request['qty']);
        return response()->json(['success' => 'La quatité a bien été mise à jour']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->withSuccess('Le plat à bien été supprimé');
    }

    public function destroyAll()
    {
        Cart::removeAll();
        return redirect()->back()->withSuccess('Le panier à bien été vidé');
    }
}

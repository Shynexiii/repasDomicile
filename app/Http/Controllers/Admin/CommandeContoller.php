<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CommandeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->adresse, auth()->user()->commandes[0]->adresse);
        $commandes = Commande::all();
        return view('admin.commandes.index', compact('commandes'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commandes = Commande::find($id);
        // dd($commandes->plats[0]->getOriginal()['pivot_quantite']);
        return view('admin.commandes.detail', compact('commandes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $commande = Commande::find($id);
        $this->validate($request, [
            'status' => Rule::in(['En cours', 'Livrée']),
        ]);

        $commande->status = $request->status;
        $commande->save();
        return back()->with('success', 'Le status de la commande à bien  été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

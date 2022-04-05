<?php

namespace App\Http\Controllers\Admin;

use App\Models\Avis;
use App\Models\Plat;
use App\Models\User;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvisController extends Controller
{
    private bool $canCommented = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avis = Avis::all();
        return view('front.Avis.avis', compact('avis'));
    }

    public function adminList()
    {
        $avis = Avis::all();
        return view('admin.avis.index', compact('avis'));
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
        $request->validate([
            'note' => 'min:1|max:4|required',
            'commentaire' => 'string|required'
        ]);
        $avis = new Avis;
        $avis->note = $request->input('note');
        $avis->commentaire = $request->input('commentaire');
        $avis->user()->associate(auth()->user());
        $avis->plat()->associate($plat);
        $avis->save();
        return back()->with('success', 'Votre avis a bien été enregistrer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($commande, $plat, Request $request)
    {
        $commande = Commande::find($commande);
        if (auth()->user()->commandes->find($commande)->plats->find($plat)) {
            $this->canCommented = true;
            $canCommented = $this->canCommented;
        }
        $plat = Plat::find($plat);
        $avis = Avis::all();
        return view('front.Avis.avis', compact('plat', 'avis', 'canCommented'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avis $avis)
    {
        $avis->delete();
        return back()->with('success', 'Votre avis a bien été supprimer');
    }


    public function show2($plat, Request $request)
    {
        $canCommented = $this->canCommented;
        $plat = Plat::find($plat);
        $avis = Avis::all();
        return view('front.Avis.avis', compact('plat', 'avis', 'canCommented'));
    }
}

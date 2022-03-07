<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $plats = Plat::all();
        // dd(Auth::user()->name);
        return view('admin.plats.index', compact('plats', 'jours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('admin.plats.create', compact('jours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'jour' => 'required',
        ]);

        $plat = Plat::create($request->all());

        return Redirect::route('plats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function show(Plat $plat)
    {
        return view('admin.plats.show', compact('plat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function edit(Plat $plat)
    {
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
        return view('admin.plats.edit', compact('plat', 'jours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plat $plat)
    {
        $editPlat = Plat::find($plat->id);
        $this->validate($request, [
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'jour' => 'required',
        ]);

        $editPlat->nom = $request->input('nom');
        $editPlat->description = $request->input('description');
        $editPlat->prix = $request->input('prix');
        $editPlat->image = $request->input('image');
        $editPlat->jour = $request->input('jour');
        $editPlat->save();

        return Redirect::route('plats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plat $plat)
    {
        $plat->delete();
        return Redirect::route('plats.index');
    }
}

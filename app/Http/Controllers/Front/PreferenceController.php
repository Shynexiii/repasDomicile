<?php

namespace App\Http\Controllers\Front;

use App\Models\Plat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Preference;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plats = auth()->user()->plats;
        return view('front.preference', compact('plats'));
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
    public function storePreference(Request $request, Plat $plat)
    {
        auth()->user()->plats()->toggle([$plat->id]);
        return redirect()->back()->with('success', 'Le plat à bien été ajouté a vos préférences');
    }

    public function removePreference(Request $request, Plat $plat)
    {
        auth()->user()->plats()->toggle([$plat->id]);
        return redirect()->back()->with('success', 'Le plat à bien été enlevé de vos préférences');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->plats()->toggle([$id]);
        return redirect()->back()->with('success', 'Le plat à bien été enlever de vos préférences');
    }
}

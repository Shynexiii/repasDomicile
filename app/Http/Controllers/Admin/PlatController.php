<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plats = Plat::all();

        return view('pages.plats.index', compact('plats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.plats.create');
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
        ]);

        $plat = Plat::create($request->all());

        return redirect()->route('plats.index');
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
    public function update(Request $request, Plat $plat)
    {
        //
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
        return redirect()->route('plats.index');
    }
}

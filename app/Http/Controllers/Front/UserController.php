<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Adresse;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        // $u = User::find($user->id)->adresse()->get();
        // dd($u, $user->adresse()->ville);
        return view('front.profile', compact('user'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
        $request->validate([
            'last_name' => 'required|min:4|string|max:255',
            'first_name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255',
            'phone' => 'required|digits:10',
        ]);
        // dd($user, $request);
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Le profile à bien été mis à jour.');
    }

    public function updatePassword(Request $request, User $user)
    {
        // dd($request);
        $request->validate([
            'current_password' => 'sometimes|password',
            'password' => 'sometimes|confirmed',
        ]);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Le mot de passe à bien été mis à jour.');
    }

    public function update_adresse(Request $request, User $user)
    {
        // dd($user->adresse);
        $request->validate([
            'nom' => 'sometimes|string|max:255',
            'ville' => 'sometimes|string|max:50',
            'code_postal' => 'sometimes|digits:5',
        ]);
        $user->adresse->nom = $request->nom;
        $user->adresse->ville = $request->ville;
        $user->adresse->code_postal = $request->code_postal;
        $user->adresse->save();
        return redirect()->back()->with('success', "L'adresse à bien été mis à jour.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Commande;
use App\Models\Plat;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd($users->adresse->nom);
        $users = User::all();
        $platCount = Plat::count();
        $commandes = Commande::all();
        $montantTotal = Commande::sum('montant');
        return view('admin.accueil.index', compact(
            'users',
            'platCount',
            'commandes',
            'montantTotal'
        ));
    }
}

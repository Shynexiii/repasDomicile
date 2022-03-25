<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Plat;
use App\Models\User;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $montantTotal = floatval(Commande::sum('montant'));
        $montantTotal = Commande::select(DB::raw('sum(cast(montant as double))'))->first();
        // dd($montantTotal->getAttributes()['sum(cast(montant as double))']);
        return view('admin.accueil.index', compact(
            'users',
            'platCount',
            'commandes',
            'montantTotal',
        ));
    }
}

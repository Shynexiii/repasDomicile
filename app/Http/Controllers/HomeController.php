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
        return view('admin.accueil.index', compact(
            'users',
            'platCount',
            'commandes',
        ));
    }
}

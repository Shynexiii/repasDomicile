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
        // dd(request()->is('admin/home'));
        $userCount = User::count();
        $platCount = Plat::count();
        $commandeCount = Commande::count();
        $montantTotal = Commande::sum('montant');
        return view('admin.accueil.index', compact(
            'userCount',
            'platCount',
            'commandeCount',
            'montantTotal'
        ));
    }
}

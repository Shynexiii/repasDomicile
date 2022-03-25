<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Plat;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class PlatChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $plats = Plat::all();
        $top_plats = collect();
        $plat_name = collect();
        // $plat_note = collect();
        foreach ($plats as $key => $plat) {
            // $plat_note->push($plats->avis->pluck('note'));
            $plat_name->push($plat->nom);
            $top_plats->push($plat->commandes->count());
        }
        return Chartisan::build()
            ->labels($plat_name->toArray())
            ->dataset('Plat', $top_plats->toArray());
        // ->dataset('Sample 3', [3.5, 4.2, 1.5])
        // ->dataset('Sample 2', [3, 2, 1]);
    }
}

<?php

namespace App\Http\Controllers\Front;

use LaravelDaily\Invoices\Invoice;
use App\Http\Controllers\Controller;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class FactureController extends Controller
{
    public function facture(int $id)
    {
        $customer = new Buyer([
            'name'          => auth()->user()->first_name . ' ' . auth()->user()->last_name,
            'phone'           => auth()->user()->phone,
            'custom_fields' => [
                'email' => auth()->user()->email,
                'adresse' => auth()->user()->adresse->nom . ', ' . auth()->user()->adresse->ville . ', ' . auth()->user()->adresse->code_postal,

            ],
        ]);
        $serial = 'CL' . auth()->user()->id . '-';
        foreach (auth()->user()->commandes as $commande) {
            if ($commande->id == $id || auth()->user()->role === "admin") {
                $serial .= $commande->id . '-';
                foreach ($commande->plats as $plat) {
                    $items[] =
                        (new InvoiceItem())
                        ->title($plat->nom)
                        ->description($plat->description)
                        ->pricePerUnit($plat->prix)
                        ->quantity($plat->getOriginal()['pivot_quantite']);

                    $serial .= $plat->id;
                }
            } else {
                abort(404);
            }
        }


        $invoice = Invoice::make()
            ->buyer($customer)
            ->serialNumberFormat($serial)
            ->addItems($items);

        return $invoice->stream();
    }
}

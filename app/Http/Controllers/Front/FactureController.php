<?php

namespace App\Http\Controllers\Front;

use LaravelDaily\Invoices\Invoice;
use App\Http\Controllers\Controller;
use App\Models\Commande;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class FactureController extends Controller
{
    public function facture(int $id)
    {
        $commande = commande::find($id);
        if ($commande == null) {
            abort(404);
        } elseif (auth()->user() == $commande->user || auth()->user()->role == "admin") {
            $customer = new Buyer([
                'name'          => $commande->user->first_name . ' ' . $commande->user->last_name,
                'phone'           => $commande->user->phone,
                'custom_fields' => [
                    'email' => $commande->user->email,
                    'adresse' => $commande->user->adresse->nom . ', ' . $commande->user->adresse->ville . ', ' . $commande->user->adresse->code_postal,

                ],
            ]);

            $serial = "CL" . $commande->user->id . "-" . $commande->created_at->format("ymdhi");
            $serial .= $commande->id;
            foreach ($commande->plats as $plat) {
                $items[] =
                    (new InvoiceItem())
                    ->title($plat->nom)
                    ->description($plat->description)
                    ->pricePerUnit($plat->prix)
                    ->quantity($plat->getOriginal()['pivot_quantite']);
            }

            $invoice = Invoice::make()
                ->serialNumberFormat($serial)
                ->buyer($customer)
                ->addItems($items)
                ->filename($commande->user->first_name . '_' . $commande->user->last_name . '_' . $commande->created_at->format("ymdhi"));
            return $invoice->stream();
        } else {
            abort(404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DevisMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Honeypot anti-spam
        if ($request->filled('website')) {
            return redirect()->route('home');
        }

        $validated = $request->validate([
            'prenom'          => 'required|string|max:100',
            'nom'             => 'required|string|max:100',
            'email'           => 'required|email|max:255',
            'telephone'       => 'nullable|string|max:20',
            'type_evenement'  => 'required|string|max:100',
            'nb_convives'     => 'required|integer|min:1',
            'date_evenement'  => 'nullable|date',
            'message'         => 'nullable|string',
        ]);

        // Créer ou retrouver le client
        $client = Client::firstOrCreate(
            ['email' => $validated['email']],
            [
                'prenom'    => $validated['prenom'],
                'nom'       => $validated['nom'],
                'telephone' => $validated['telephone'] ?? null,
            ]
        );

        // Créer le devis
        $devis = Devis::create([
            'client_id'       => $client->id,
            'type_evenement'  => $validated['type_evenement'],
            'nb_convives'     => $validated['nb_convives'],
            'date_evenement'  => $validated['date_evenement'] ?? null,
            'message'         => $validated['message'] ?? null,
            'statut'          => 'nouveau',
        ]);

        // Envoyer l'email via Mailtrap
        Mail::to('iloisell@orange.fr')->send(new DevisMail($client, $devis));

        return redirect()->route('home')->with('success', 'Votre demande a bien été envoyée ! Isabel vous répondra sous 48h. ✦');
    }
}
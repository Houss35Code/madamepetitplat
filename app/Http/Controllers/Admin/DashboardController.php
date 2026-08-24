<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devis;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'devis_total'    => Devis::count(),
            'devis_nouveaux' => Devis::where('statut', 'nouveau')->count(),
            'devis_acceptes' => Devis::where('statut', 'accepte')->count(),
            'clients_total'  => Client::count(),
        ];

        $derniers_devis = Devis::with('client')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'derniers_devis'));
    }
}

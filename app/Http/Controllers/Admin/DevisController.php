<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devis;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function index()
    {
        $devis = Devis::with('client')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.devis.index', compact('devis'));
    }

    public function show($id)
    {
        $devis = Devis::with('client')->findOrFail($id);
        return view('admin.devis.show', compact('devis'));
    }

    public function update(Request $request, $id)
    {
        $devis = Devis::findOrFail($id);
        $request->validate([
            'statut' => 'required|in:nouveau,en_cours,accepte,refuse',
        ]);
        $devis->update(['statut' => $request->statut]);
        return back()->with('success', 'Statut mis à jour.');
    }

    public function destroy($id)
    {
        $devis = Devis::findOrFail($id);
        $devis->delete();
        return redirect()->route('admin.devis.index')->with('success', 'Devis supprimé.');
    }
}
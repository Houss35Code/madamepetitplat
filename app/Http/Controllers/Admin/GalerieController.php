<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    public function index()
    {
        $photos = Galerie::orderBy('ordre')->orderBy('created_at', 'desc')->get();
        return view('admin.galerie.index', compact('photos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'photos.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
    ]);

    $files = $request->file('photos');

    if (!$files) {
        return back()->with('error', 'Aucune photo sélectionnée.');
    }

    foreach ((array) $files as $file) {
        if (!$file) continue;

        $chemin = $file->store('galerie', 'public');

        Galerie::create([
            'chemin'  => $chemin,
            'titre'   => $request->titre ?? null,
            'alt'     => $request->alt ?? null,
            'ordre'   => Galerie::count(),
            'visible' => true,
        ]);
    }

    return back()->with('success', 'Photos ajoutées avec succès.');
}

    public function destroy($id)
    {
        $photo = Galerie::findOrFail($id);
        Storage::disk('public')->delete($photo->chemin);
        $photo->delete();

        return back()->with('success', 'Photo supprimée.');
    }
}
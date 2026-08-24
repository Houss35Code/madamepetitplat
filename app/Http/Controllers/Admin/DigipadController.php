<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Digipad;
use Illuminate\Http\Request;

class DigipadController extends Controller
{
    public function index()
    {
        $padlets = Digipad::orderBy('ordre')->orderBy('created_at', 'desc')->get();
        return view('admin.digipad.index', compact('padlets'));
    }

    public function create()
    {
        return view('admin.digipad.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre'       => 'required|string|max:255',
            'url'         => 'required|url',
            'description' => 'nullable|string',
            'visible'     => 'boolean',
        ]);

        $validated['visible'] = $request->has('visible');
        $validated['ordre']   = Digipad::count();

        Digipad::create($validated);

        return redirect()->route('admin.digipad.index')->with('success', 'Padlet ajouté avec succès.');
    }

    public function edit(Digipad $digipad)
    {
        return view('admin.digipad.edit', compact('digipad'));
    }

    public function update(Request $request, Digipad $digipad)
    {
        $validated = $request->validate([
            'titre'       => 'required|string|max:255',
            'url'         => 'required|url',
            'description' => 'nullable|string',
            'visible'     => 'boolean',
        ]);

        $validated['visible'] = $request->has('visible');
        $digipad->update($validated);

        return redirect()->route('admin.digipad.index')->with('success', 'Padlet mis à jour.');
    }

    public function destroy(Digipad $digipad)
    {
        $digipad->delete();
        return redirect()->route('admin.digipad.index')->with('success', 'Padlet supprimé.');
    }
}
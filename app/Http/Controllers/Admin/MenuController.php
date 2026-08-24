<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(): View
    {
        $menus = Menu::orderBy('ordre')->orderBy('created_at', 'desc')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create(): View
    {
        return view('admin.menus.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titre'    => 'required|string|max:255',
            'occasion' => 'nullable|string|max:255',
            'convives' => 'nullable|string|max:255',
            'fichier'  => 'required|file|mimes:pdf|max:5120',
            'ordre'    => 'integer|min:0',
        ]);

        $path = $request->file('fichier')->store('menus', 'public');

        Menu::create([
            'slug'     => Str::slug($request->titre . '-' . uniqid()),
            'titre'    => $request->titre,
            'occasion' => $request->occasion,
            'convives' => $request->convives,
            'fichier'  => $path,
            'ordre'    => $request->ordre ?? 0,
            'visible'  => $request->boolean('visible'),
        ]);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu créé avec succès.');
    }

    public function edit(Menu $menu): View
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu): RedirectResponse
    {
        $request->validate([
            'titre'    => 'required|string|max:255',
            'occasion' => 'nullable|string|max:255',
            'convives' => 'nullable|string|max:255',
            'fichier'  => 'nullable|file|mimes:pdf|max:5120',
            'ordre'    => 'integer|min:0',
        ]);

        $data = [
            'titre'    => $request->titre,
            'occasion' => $request->occasion,
            'convives' => $request->convives,
            'ordre'    => $request->ordre ?? 0,
            'visible'  => $request->boolean('visible'),
        ];

        if ($request->hasFile('fichier')) {
            Storage::disk('public')->delete($menu->fichier);
            $data['fichier'] = $request->file('fichier')->store('menus', 'public');
        }

        $menu->update($data);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu mis à jour.');
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        Storage::disk('public')->delete($menu->fichier);
        $menu->delete();

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu supprimé.');
    }
}
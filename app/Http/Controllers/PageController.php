<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Page d'accueil — toutes les sections du site vitrine.
     */
    public function home(): View
    {
        $menus = Menu::where('visible', true)
                    ->orderBy('ordre')
                    ->get();

        $padlets = \App\Models\Digipad::where('visible', true)
                    ->orderBy('ordre')
                    ->get();

        return view('pages.home', compact('menus', 'padlets'));
    }

    public function menu(Menu $menu): View
    {
        abort_unless($menu->visible, 404);
        return view('menus.show', compact('menu'));
    }

    public function ailes(): View
    {
        $padlets = \App\Models\Digipad::where('visible', true)
                    ->orderBy('ordre')
                    ->get();

        return view('pages.pedagogie', compact('padlets'));
    }
}
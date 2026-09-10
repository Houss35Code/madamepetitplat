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

    public function sitemap()
    {
        $menus = Menu::where('visible', true)->get();

        $urls = collect();

        $urls->push([
            'loc' => route('home'),
            'lastmod' => now()->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '1.0',
        ]);

        $urls->push([
            'loc' => route('ailes'),
            'lastmod' => now()->toDateString(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ]);

        foreach ($menus as $menu) {
            $urls->push([
                'loc' => route('menus.show', $menu),
                'lastmod' => $menu->updated_at?->toDateString() ?? now()->toDateString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ]);
        }

        return response()
            ->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Assinaturas;
use App\Models\RedeSociais;
use App\Models\Produtos;

class SiteController extends Controller
{
    public function home() {

        $banners = Banners::get();

        $assinaturas = Assinaturas::get();

        $socials = RedeSociais::get();

        return view('site.home', compact(['banners', 'assinaturas', 'socials']));
    }

    public function loja() {

        $banners = Banners::get();

        $socials = RedeSociais::get();

        $produtos = Produtos::get();

        return view('site.loja', compact(['socials', 'banners', 'produtos']));
    }
}

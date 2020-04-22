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

        $md = 'order-md-2';

        $md1 = 'order-md-1';

        return view('site.loja', compact(['socials', 'banners', 'produtos', 'md', 'md1']));
    }

    public function promocao() {

        $banners = Banners::get();

        $socials = RedeSociais::get();

        $produtos = Produtos::where('promocao', '=', 1)->orWhere('novidade', '=', 1)->get();

        $md = 'order-md-2';

        $md1 = 'order-md-1';

        return view('site.promo', compact(['socials', 'banners', 'produtos', 'md', 'md1']));
    }

    public function contato() {

        $socials = RedeSociais::get();

        return view('site.contato', compact(['socials']));
    }

    public function comentarios() {

        $socials = RedeSociais::get();

        return view('site.comentario', compact(['socials']));
    }
}

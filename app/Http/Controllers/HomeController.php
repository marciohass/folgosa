<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;
use App\Models\Modelos;
use App\Models\Vendas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_vendas = Vendas::count();
        $count_assinantes = Vendas::where('tipo_venda', '=', 'S')->count();
        $count_presentes = Vendas::where('tipo_venda', '=', 'G')->count();
        $count_produtos = Vendas::where('tipo_venda', '=', 'P')->count();

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin/dashboard', compact('count_vendas','count_assinantes','count_presentes','count_produtos','modelos'));
    }
}

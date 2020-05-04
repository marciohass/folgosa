<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;
use App\Models\Modelos;

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
        $comentarios = Comentarios::get();
        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin/dashboard', compact('comentarios','modelos'));
    }
}

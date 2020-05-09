<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produtos;
use App\Models\Modelos;
use App\Models\Vendas;
use App\Models\Clientes;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Vendas::select('name','surname')->where('')->paginate(5);
        $items = Vendas::join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
                            ->select('vendas.*', 'clientes.nome')->paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-vendas', compact(['items', 'modelos'])
                )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venda = Vendas::find($id)
                    ->join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
                    ->select('vendas.*', 'clientes.*')->get();

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.form-show-venda', compact(['venda', 'modelos']));
    }

    public function showProducts()
    {
        $items = Vendas::join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
                            ->where('tipo_venda', '=', 'P')
                            ->select('vendas.*', 'clientes.nome')->paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-venda-produtos', compact(['items', 'modelos'])
                )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showSubscritions()
    {
        $items = Vendas::join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
                            ->where('tipo_venda', '=', 'S')
                            ->select('vendas.*', 'clientes.nome')->paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-venda-assinaturas', compact(['items', 'modelos'])
                )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showGifts()
    {
        $items = Vendas::join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
                            ->where('tipo_venda', '=', 'G')
                            ->select('vendas.*', 'clientes.nome')->paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-venda-presentes', compact(['items', 'modelos'])
                )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

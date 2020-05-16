<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Modelos;
use App\Models\Produtos;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailMkt;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Clientes::paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-clientes', compact(['items', 'modelos'])
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
        $cliente = Clientes::find($id);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.show-cliente', compact(['cliente', 'modelos']));
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
        $data = Clientes::findOrFail($id);
        $data->delete();

        return redirect('admin/lista-clientes')->with('success', 'Cliente excluído com sucesso!');
    }

    public function sendMailMkt() {

        $items = Clientes::paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        $clientes_mkt = Clientes::select('email', 'nome')->where('email_mkt', '=', 1)->get();

        $novidades = Produtos::where('novidade', '=', 1)->get();

        foreach($clientes_mkt as $mkt) {

            Mail::to($mkt->email)->send(new SendMailMkt($novidades, $mkt->email, $mkt->nome));
        }

        return view('admin.lista-clientes', compact(['items', 'modelos'])
                )->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

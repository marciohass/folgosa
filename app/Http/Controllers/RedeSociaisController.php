<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RedeSociais;

class RedeSociaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RedeSociais::paginate(5);

        return view('admin.lista-redesociais', compact('items')
                )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form-redesociais');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'link'=> 'required'
          ]);

        $redesocial = new RedeSociais([
            'nome' => $request->get('nome'),
            'link'=> $request->get('link'),
            'modelo_id'=> auth()->user()->id
          ]);

        $redesocial->save();

        return redirect('admin/form-redesociais')->with('success', 'Rede Social adicionada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $redesocial = RedeSociais::find($id);

        return view('admin.form-edit-redesociais', compact('redesocial'));
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
        $request->validate([
            'nome'=>'required',
            'link'=> 'required'
        ]);

        $redesocial = RedeSociais::find($id);
        $redesocial->nome = $request->get('nome');
        $redesocial->link = $request->get('link');
        $redesocial->modelo_id = auth()->user()->id;

        $redesocial->save();

        return redirect('admin/lista-redesociais')->with('success', 'Rede Social atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RedeSociais::findOrFail($id);
        $data->delete();

        return redirect('admin/lista-redesociais')->with('success', 'Rede Social excluída com sucesso!');
    }
}

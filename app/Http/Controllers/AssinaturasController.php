<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assinaturas;
use App\Models\Modelos;

class AssinaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Assinaturas::paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-assinaturas', compact(['items', 'modelos'])
                )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.form-assinaturas', compact('modelos'));
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
            'valor'=> 'required'
          ]);

        $assinatura = new Assinaturas([
            'nome' => $request->get('nome'),
            'descricao'=> $request->get('descricao'),
            'valor'=> $request->get('valor'),
            'modelo_id'=> auth()->user()->id
          ]);

        if($request->file('image')){
		    $midia = $request->file('image');
            $midia->move(public_path('/image_assinaturas'), $request->file('image')->getClientOriginalName());
            $assinatura->imagem = $request->file('image')->getClientOriginalName();
        }

        $assinatura->save();

        return redirect('admin/form-assinaturas')->with('success', 'Assinatura foi cadastrada!');
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
        $assinatura = Assinaturas::find($id);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.form-edit-assinaturas', compact(['assinatura', 'modelos']));
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
            'valor'=> 'required'
        ]);

        $assinatura = Assinaturas::find($id);
        $assinatura->nome = $request->get('nome');
        $assinatura->descricao = $request->get('descricao');
        $assinatura->valor = $request->get('valor');
        $assinatura->modelo_id = auth()->user()->id;

        if($request->file('image')){
		    $midia = $request->file('image');
            $midia->move(public_path('/image_assinaturas'), $request->file('image')->getClientOriginalName());
            $assinatura->imagem = $request->file('image')->getClientOriginalName();
        } else {
            $assinatura->imagem = $request->get('hidden_image');
        }

          $assinatura->save();

          return redirect('admin/lista-assinaturas')->with('success', 'Assinatura foi atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Assinaturas::findOrFail($id);
        $data->delete();

        return redirect('admin/lista-assinaturas')->with('success', 'Assinatura excluída com sucesso!');
    }

}

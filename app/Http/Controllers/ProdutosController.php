<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Modelos;
use App\Models\Clientes;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailMkt;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Produtos::paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-produtos', compact(['items', 'modelos'])
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

        return view('admin.form-produtos', compact('modelos'));
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
            'titulo'=>'required',
            'valor'=> 'required'
          ]);

        $produto = new Produtos([
            'titulo' => $request->get('titulo'),
            'descricao'=> $request->get('descricao'),
            'valor'=> $request->get('valor'),
            'novidade'=> $request->get('novidade'),
            'promocao'=> $request->get('promocao'),
            'valor_promocao'=> $request->get('valor_promocao'),
            'modelo_id'=> auth()->user()->id
          ]);

        if($request->file('image')){
		    $midia = $request->file('image');
            $midia->move(public_path('/image_produtos'), $request->file('image')->getClientOriginalName());
            $produto->foto = $request->file('image')->getClientOriginalName();
        }

        $produto->save();

        return redirect('admin/form-produtos')->with('success', 'Produto foi cadastrado!');

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
        $produto = Produtos::find($id);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.form-edit-produtos', compact(['produto', 'modelos']));
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
            'titulo'=>'required',
            'valor'=> 'required'
        ]);

        $produto = Produtos::find($id);
        $produto->titulo = $request->get('titulo');
        $produto->descricao = $request->get('descricao');
        $produto->valor = $request->get('valor');
        $produto->novidade = $request->get('novidade');
        $produto->promocao = $request->get('promocao');
        $produto->valor_promocao = $request->get('valor_promocao');
        $produto->modelo_id = auth()->user()->id;

        if($request->file('image')){
		    $midia = $request->file('image');
            $midia->move(public_path('/image_produtos'), $request->file('image')->getClientOriginalName());
            $produto->foto = $request->file('image')->getClientOriginalName();
        } else {
            $produto->foto = $request->get('hidden_image');
        }

          $produto->save();

          return redirect('admin/lista-produtos')->with('success', 'Produto foi atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produtos::findOrFail($id);
        $data->delete();

        return redirect('admin/lista-produtos')->with('success', 'Produto excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelos;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $profile = Modelos::find($id);

        return view('admin.form-profile', compact('profile'));
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

        $modelo = Modelos::find($id);

        $modelo->nome = $request->get('nome');
        $modelo->descricao = $request->get('descricao');
        $modelo->telefone = $request->get('telefone');
        $modelo->email = $request->get('email');

        if($request->file('image')){
		    $midia = $request->file('image');
            $midia->move(public_path('/image_perfil'), $request->file('image')->getClientOriginalName());
            $modelo->foto = $request->file('image')->getClientOriginalName();
        } else {
            $modelo->foto = $request->get('hidden_image');
        }

          $modelo->save();

          return redirect('admin/form-profile/'.$id)->with('success', 'Perfil foi atualizado!');
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

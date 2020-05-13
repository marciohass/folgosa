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

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.form-profile', compact(['profile', 'modelos']));
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
        $modelo->user_id = auth()->user()->id;

        if($request->file('image')){
            $midia = $request->file('image');
            $midia->move(public_path('/image_perfil'), $request->file('image')->getClientOriginalName());
            $modelo->foto = $request->file('image')->getClientOriginalName();
        } else {
            $modelo->foto = $request->get('hidden_image');
        }
/*
        if($request->file('logo')){
		    $midia2 = $request->file('logo');
            $midia2->move(public_path('/image_logo'), $request->file('logo')->getClientOriginalName());
            $modelo->logo = $request->file('logo')->getClientOriginalName();
        } else {
            $modelo->logo = $request->get('hidden_logo');
        }
*/
          $modelo->save();

          return redirect('admin/form-profile/'.$id)->with('success', 'Perfil foi atualizado!');
    }

    public function upload_logo(Request $request, $id) {

        $modelo = Modelos::find($id);

        $data = $request->get('logo');

        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        file_put_contents(public_path('/image_logo').'/'.$imageName, $data);

        $modelo->logo = $imageName;
        $modelo->save();

        return '<img src="'.'/image_logo'.'/'.$imageName.'" class="img-thumbnail" />';
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Modelos;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Banners::paginate(5);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.lista-banners', compact(['items', 'modelos'])
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

        return view('admin.form-banners', compact('modelos'));
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
            'image'=>'required'
          ]);

        $banner = new Banners([
            'titulo' => $request->get('titulo'),
            'descricao'=> $request->get('descricao'),
            'modelo_id'=> auth()->user()->id
          ]);

        if($request->file('image')){
		    $midia = $request->file('image');
            $midia->move(public_path('/image_banners'), $request->file('image')->getClientOriginalName());
            $banner->banner = $request->file('image')->getClientOriginalName();
        }

        $banner->save();

        return redirect('admin/form-banners')->with('success', 'Banner adicionado com sucesso!');
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
        $banner = Banners::find($id);

        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin.form-edit-banners', compact(['banner', 'modelos']));
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

        $banner = Banners::find($id);
        $banner->titulo = $request->get('titulo');
        $banner->descricao = $request->get('descricao');
        $banner->modelo_id = auth()->user()->id;

        if($request->file('image')){
		    $midia = $request->file('image');
            $midia->move(public_path('/image_banners'), $request->file('image')->getClientOriginalName());
            $banner->banner = $request->file('image')->getClientOriginalName();
        } else {
            $banner->banner = $request->get('hidden_image');
        }

          $banner->save();

          return redirect('admin/lista-banners')->with('success', 'Banner foi atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Banners::findOrFail($id);
        $data->delete();

        return redirect('admin/lista-banners')->with('success', 'Banner excluída com sucesso!');
    }
}

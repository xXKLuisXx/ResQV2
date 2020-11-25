<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Historia;
use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $historias = Historia::all();
        $historia = $historias->find($request->historia_id);
        $comentarios = json_encode($historia->comentarios);
        return response()->json($comentarios);
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
        $response = Http::post('http://18.223.169.158:8100/', [
            'text' => $request->comentario,
        ]);

        if($response['permited'] == false) {
            return redirect()->route('historia.index')->with('message', 'Esta historia contiene mensajes inapropiados');
        }

        $input = $request->all();
        \Log::info($input);
        $comentario = new Comentario();
        $comentario->contenido = $request->comentario;
        $comentario->historia_id = $request->historia_id;
        $comentario->user_id = $request->user_id;
        $comentario->save();
        $json = json_encode($comentario);
        return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }

    public function user()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}

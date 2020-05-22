<?php

namespace App\Http\Controllers;

use App\Historia;
use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historias = Historia::all();
        return view('/historia', \compact('historias'));
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
        $historia = new Historia();
        $historia->contenido = $request->historia;
        $historia->privacidad = $request->privacidad;
        $historia->user_id = \Auth::id();
        $historia->save();
        foreach ($request->imagenes as $imagen){
            $imagenDb = new Imagen();
            $imagenDb->historia_id = $historia->id;
            $imagenDb->nombre_imagen = $imagen->getClientOriginalName();
            $imagenDb->extension = $imagen->extension();
            $imagenDb->path = Storage::putFile('storage', $imagen);
            $imagenDb->save();
            //echo $path;
        }
        //echo $request->file('imagenes');
        //$path = $request->imagenes->store('images');
        //echo $path;
        //Storage::putFile('images', new File('/path/to/photo')); echo $request->files;
        
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function show(Historia $historia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function edit(Historia $historia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historia $historia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historia $historia)
    {
        //
    }
}

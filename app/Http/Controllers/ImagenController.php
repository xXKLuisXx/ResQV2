<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Scopes\PublicScope;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Artisan;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = new Process(['C:\Users\veloc\AppData\Local\Programs\Python\Python39\python', 'nlp_script.py', 'arg1']);

        try {
            $process->run();
            echo $process->getOutput();

        } catch (ProcessFailedException $exception) {
            echo $exception->getMessage();
        }
        
        return response()->json();
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
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {
        //echo "pertenece: ".$imagen->imagenable;
        //dd($imagen);
        $type = $imagen->imagenable;
        //echo get_class($type->getRelated());

        if (isset($type->email) ){
            //echo "Entra";
            //dd($imagen);
            Storage::delete([$imagen->path]);
            $imagen->delete();
            return redirect()->route('editPerfil', $type->id )->with('message', 'Imagen eliminada');
        }else {
            if(isset($type->contenido)){
                //echo "Entra 2";
                //dd($imagen);
                Storage::delete([$imagen->path]);
                $imagen->delete();
                return redirect()->route('historia.edit', $type->id )->with('message', 'Imagen eliminada');
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Historia;
use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class HistoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias = Historia::with(['imagenes', 'user', 'comentarios'])->get();
        return view('/historia', \compact('historias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('historia/historiaForm');
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
            'titulo' => 'required|min:5',
            'contenido' => 'required|min:25',
            'privacidad' => 'required',
            'imagenes' => '',
        ]);

        $historia = new Historia();
        $historia->contenido = $request->contenido;
        $historia->titulo = $request->titulo;
        $historia->privacidad = $request->privacidad;
        $historia->user_id = \Auth::id();
        $historia->save();

        if ($request->imagenes != '') {
            foreach ($request->imagenes as $imagen) {
                $imagenDb = new Imagen();
                $imagenDb->historia_id = $historia->id;
                $imagenDb->nombre_imagen = $imagen->getClientOriginalName();
                $imagenDb->extension = $imagen->extension();
                $imagenDb->path = Storage::putFile('storage', $imagen);
                $imagenDb->save();
                //echo $path;
            }
        }
        //echo $request->file('imagenes');
        //$path = $request->imagenes->store('images');
        //echo $path;
        //Storage::putFile('images', new File('/path/to/photo')); echo $request->files;

        return redirect()->route('historia.index')->with('message', 'Historia agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function show($id)/*Historia $historia)*/
    {
        $historia = Historia::where('id', $id)->first();
        return view('historia/historiaShow', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)/*Historia $historia)*/
    {
        $historia = Historia::where('id', $id)->first();
        return view('historia/historiaForm', compact('historia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)/*Historia $historia)*/
    {
        $request->validate([
            'titulo' => 'required|min:5',
            'contenido' => 'required|min:25',
            'privacidad' => 'required',
            'imagenes' => '',
        ]);

        $data = $request->except('imagenes', '_token', '_method');

        if ($request->imagenes != '') {
            foreach ($request->imagenes as $imagen) {
                $imagenDb = new Imagen();
                $imagenDb->historia_id = $id;
                $imagenDb->nombre_imagen = $imagen->getClientOriginalName();
                $imagenDb->extension = $imagen->extension();
                $imagenDb->path = Storage::putFile('storage', $imagen);
                $imagenDb->save();
            }
        }

        Historia::where('id', $id)->update($data);
        return redirect()->route('historia.show', $id)->with('message', 'Historia actualizada');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)/*Historia $historia)*/
    {
        $historia = Historia::where('id', $id)->first();
        $historia->delete();
        return redirect()->route('historia.index')->with('message', 'Historia eliminada');
    }
}

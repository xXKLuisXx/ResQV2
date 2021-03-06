<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\User;
use Auth;
use App\Historia;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Scopes\PublicScope;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show_descriptive');
    }
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

    public function show_descriptive(User $user){
        $descriptive['user'] = $user->name;
        $descriptive['historias'] = Historia::where('user_id', $user->id)->get();

        $ev_comentarios = DB::select('SELECT SUM(evaluacions.calificacion) AS cal, COUNT(evaluacions.id) AS tot FROM comentarios LEFT JOIN evaluacions ON comentarios.id = evaluacions.comentario_id WHERE comentarios.user_id=?', [$user->id]);

        $item = $ev_comentarios[0]->tot;
        $ev_tot = $ev_comentarios[0]->cal;

        if ($item != 0) {
            $descriptive['total'] = $item;
            $descriptive['calificacion'] = $ev_tot / $descriptive['total'];
        } else {
            $descriptive['total'] = 0;
            $descriptive['calificacion'] = 1;
        }

        $json = json_encode($descriptive);
        return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$user = User::where('id', $id)->first();
        $user->id == Auth::user()->id ? $mi_perfil = true : $mi_perfil = false;
        $historias = Historia::withoutGlobalScope(PublicScope::class)->where('user_id', $user->id)->get();

        $ev_comentarios = DB::select('SELECT SUM(evaluacions.calificacion) AS cal, COUNT(evaluacions.id) AS tot FROM comentarios LEFT JOIN evaluacions ON comentarios.id = evaluacions.comentario_id WHERE comentarios.user_id=?', [$user->id]);

        $item = $ev_comentarios[0]->tot;
        $ev_tot = $ev_comentarios[0]->cal;

        if ($item != 0) {
            $rating['total'] = $item;
            $rating['calificacion'] = $ev_tot / $rating['total'];
        } else {
            $rating['total'] = 0;
            $rating['calificacion'] = 1;
        }

        $is_valid_chat = false;
        //si el id es diferente al mio

        if(Auth::user()->roles->find(3) == null){
            if($user->id != Auth::user()->id){
                if($user->roles->find(3) != null){
                    $is_valid_chat = true;
                }
            }
        }
        
        //dd($is_valid_chat);
        return view('perfil/perfilShow', compact('user', 'historias', 'rating', 'mi_perfil', 'is_valid_chat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->id == Auth::user()->id) {
            return view('perfil/perfilEdit', compact('user'));
        } else {
            return view('layouts/error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255|min:10',
            'perfil' => 'mimes:png,jpg,gif,jpeg,JPG',
            'biografia' => 'required|min:25',
        ]);

        $data = $request->except('perfil', '_token', '_method');

        if ($request->hasFile('perfil')) {
            $user = User::find(Auth::user()->id);
            if ($user->imagen != null) {
                $imagen = $user->imagen;
                $imagen->nombre_imagen = $request->perfil->getClientOriginalName();
                $imagen->extension =  $request->perfil->extension();
                $imagen->path = Storage::putFile('storage', $request->perfil);
                $imagen->save();
            } else {
                $user->imagen()->create([
                    'nombre_imagen' => $request->perfil->getClientOriginalName(),
                    'extension' => $request->perfil->extension(),
                    'path' => Storage::putFile('storage', $request->perfil),
                ]);
            }

            //$data['url_perfil'] = Storage::putFile('storage', $request->perfil);
        }

        User::where('id', Auth::user()->id)->update($data);

        return redirect()->route('perfil', Auth::user()->id)->with('message', 'Perfil actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

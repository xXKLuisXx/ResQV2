<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\User;
use Auth;
use App\Historia;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
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
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$user = User::where('id', $id)->first();
        $user->id == Auth::user()->id ? $mi_perfil = true : $mi_perfil = false;
        $historias = Historia::where('user_id', $user->id)->get();
        $rating['total'] = 10;
        $rating['calificacion'] = 30 / $rating['total'];

        return view('perfil/perfilShow', compact('user', 'historias', 'rating', 'mi_perfil'));
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
            'perfil' => 'mimes:png,jpg,gif',
            'biografia' => 'required|min:25',
        ]);

        $data = $request->except('perfil', '_token', '_method');

        if ($request->hasFile('perfil')) {
            $data['url_perfil'] = Storage::putFile('storage', $request->perfil);
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

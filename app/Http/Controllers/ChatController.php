<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use App\Role;
use DB;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $psicologos = DB::table('users as usr')
        ->leftJoin('role_user as ru', 'ru.user_id', '=', 'usr.id')
        ->leftJoin('roles as r', 'r.id', '=', 'ru.role_id')
        ->where('ru.role_id', 3)
        ->select('*')
        ->get();
        */
        $psicologos = Role::find(3)->users;
        $chats = Auth::user()->chats;

        //dd($psicologos, $chats);

        return view('chat.chat-index', ['psicologos' => $psicologos, 'chats' => $chats]);
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
        $psicologo = User::find($request->user_id);
        
        $chat = new Chat();
        $chat->title = "chat";
        $chat->save();

        Auth::user()->chats()->attach($chat->id);
        $psicologo->chats()->attach($chat->id);
        
        return redirect('/chat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
        $mensajes = $chat->mensajes;
        $chat_id = $chat->id;
        return view('chat.private-chat', compact('mensajes', 'chat_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}

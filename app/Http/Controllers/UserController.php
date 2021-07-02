<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $users = User::with('orders')->get();
        return view('Booksto.Admin.user.user_index', compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.user.user_form',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $request->validate([
            'tipo' => 'required|string',
        ]);

        User::where('id', $usuario->id)->update($request->except('_token','_method'));
        return redirect()->route('usuarios.index')->with('update','Rol de usuario se actualizo con exito.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    { 
        $userlogin = Auth::user();
        if($userlogin->id == 1)
        {
            $users = DB::table('users')->Simplepaginate(10);
            return view('user.index',compact('users'));
        }
        else
        {
            return redirect()->route('home')
                    ->with('success', 'No estas autorizado. Inicia sesion como administrador');
        }
    }
    
    public function edit($id)
    {
        $userlogin = Auth::user();
        if($userlogin->id == 1)
        {
            $user = User::find($id);
            $roles = Role::pluck('rol','id');
            return view('user.edit',compact('user','roles'));
        }
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('user.index')
            ->with('success', 'Usuario actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')
            ->with('success', 'Usuario eliminado satisfactoriamente');
    }
}

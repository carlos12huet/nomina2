<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userlogin = Auth::user();
        if($userlogin == null)
        {
            return view('home');
        }
        elseif(($userlogin->id == 1) && ($userlogin->role_id == null))
        {
            return redirect()->route('role.create')
            ->with('success', 'Ingresaste como Administrador, crea un rol y añadelo al usuario creado');
        }
        elseif($userlogin->id == 1)
        {
            return view('home');
        }
        elseif($userlogin->role_id == null)
        {
            Auth::logout();
            return redirect()->route('home')
            ->with('success', 'No tienes un rol. Consulta al administrador');
        }
        else
        {
            return view('home');
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->Simplepaginate(10);
        return view('role.index',compact('roles'));
    }

    public function create()
    {
        $userlogin = Auth::user();
        if($userlogin->id == 1)
        {
            $role = new Role();
            $permissions = Permission::all();
            return view('role.create',compact('role','permissions'));
        }
        
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        if($request->permissions){
            $role->permissions()->attach($request->permissions);
        }
        return redirect()->route('role.index')
            ->with('success', 'Rol creado satisfactoriamente.');
    }

    public function show($id)
    {
        $role = Role::find($id);
        return view('role.show',compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('role.edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        if($request->permissions){
            $role->permissions()->sync($request->permissions);
        }
        return redirect()->route('role.index')
            ->with('success', 'Rol actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('role.index')
            ->with('success', 'Rol eliminado satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = DB::table('permissions')->Simplepaginate(10);
        return view('permission.index',compact('permissions'));
    }

    public function create()
    {
        $permission = new Permission();
        return view('permission.create',compact('permission'));
    }

    public function store(Request $request)
    {
        Permission::create($request->all());
        return redirect()->route('permission.index')
            ->with('success', 'Permiso creado satisfactoriamente.');
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        return view('permission.show',compact('permission'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permission.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect()->route('permission.index')
            ->with('success', 'Permiso actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permission.index')
            ->with('success', 'Permiso eliminado satisfactoriamente');
    }
}

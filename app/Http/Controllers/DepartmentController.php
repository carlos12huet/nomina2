<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentCreateRequest;
use App\Http\Requests\DepartmentEditRequest;
use App\Models\Department;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class DepartmentController extends Controller
{
    public function index()
    {
        //$departments = DB::table('departments')->get()->Simplepaginate(5);
        $departments = Department::with('project')->simplepaginate(5);
        //$departments = Department::all()->Paginate(3);
        
        return view('department.index',compact('departments'));
    }

    public function create()
    {
        $department = new Department();
        $projects = Project::pluck('nombre','id');
        return view('department.create',compact('department', 'projects'));
    }

    public function store(DepartmentCreateRequest $request)
    {
        Department::create($request->all());
        return redirect()->route('department.index')
            ->with('success', 'Regimen Fiscal creado satisfactoriamente.');
    }

    public function show($id)
    {
        $department = Department::find($id);
        return view('department.show',compact('department'));
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $projects = Project::pluck('nombre','id');
        return view('department.edit',compact('department','projects'));
    }

    public function update(DepartmentEditRequest $request, Department $department)
    {
        $department->update($request->all());
        return redirect()->route('department.index')
            ->with('success', 'Regimen fiscal actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('department.index')
            ->with('success', 'Regimen fiscal eliminado satisfactoriamente');
    }
}

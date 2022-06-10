<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentCreateRequest;
use App\Http\Requests\DepartmentEditRequest;
use App\Imports\DepartmentsImport;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')->simplepaginate(20);
        return view('department.index',compact('departments'));
    }

    public function create()
    {
        $department = new Department();
        $projects = Project::all();
        $positions = Position::all();
        return view('department.create',compact('department', 'projects','positions'));
    }

    public function store(DepartmentCreateRequest $request)
    {
        $department = Department::create($request->all());
        if($request->projects){
            $department->projects()->attach($request->projects);
        }
        if($request->positions){
            $department->positions()->attach($request->positions);
        }
        return redirect()->route('department.index')
            ->with('success', 'Departamento creado satisfactoriamente.');
    }

    public function show($id)
    {
        $department = Department::find($id);
        return view('department.show',compact('department'));
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $projects = Project::all();
        $positions = Position::all();
        return view('department.edit',compact('department','projects','positions'));
    }

    public function update(DepartmentEditRequest $request, Department $department)
    {
        $department->update($request->all());
        if($request->projects == null){
            $department->projects()->detach();
        }elseif($request->projects != null)
        {
            $department->projects()->sync($request->projects);
        }

        if($request->positions == null){
            $department->positions()->detach();
        }elseif($request->positions != null)
        {
            $department->positions()->sync($request->positions);
        }
        return redirect()->route('department.index')
            ->with('success', 'Departamento actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('department.index')
            ->with('success', 'Departamento eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('department.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new DepartmentsImport, $file);
        return redirect()->route('department.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

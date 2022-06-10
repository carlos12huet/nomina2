<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectEditRequest;
use App\Imports\ProjectsImport;
use App\Models\Department;
use App\Models\Municipality;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')->Simplepaginate(10);
        return view('project.index',compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        $departments = Department::all();
        $municipalities = Municipality::all();
        return view('project.create',compact('project','departments','municipalities'));
    }

    public function store(ProjectCreateRequest $request)
    {
        $project = Project::create($request->all());
        if($request->departments){
            $project->departments()->attach($request->departments);
        }
        if($request->municipalities){
            $project->municipalities()->attach($request->municipalities);
        }
        return redirect()->route('project.index')
            ->with('success', 'Proyecto creado satisfactoriamente.');
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('project.show',compact('project'));
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $departments = Department::all();
        $municipalities = Municipality::all();
        return view('project.edit',compact('project','departments','municipalities'));
    }

    public function update(ProjectEditRequest $request, Project $project)
    {
        $project->update($request->all());
        if($request->departments){
            $project->departments()->detach();
            $project->departments()->attach($request->departments);
        }
        if($request->municipalities){
            $project->municipalities()->detach();
            $project->municipalities()->attach($request->municipalities);
        }
        return redirect()->route('project.index')
            ->with('success', 'Proyecto actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('project.index')
            ->with('success', 'Proyecto eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('project.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new ProjectsImport, $file);
        return redirect()->route('project.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

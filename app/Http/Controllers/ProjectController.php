<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectEditRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')->Simplepaginate(5);
        return view('project.index',compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        return view('project.create',compact('project'));
    }

    public function store(ProjectCreateRequest $request)
    {
        Project::create($request->all());
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
        return view('project.edit',compact('project'));
    }

    public function update(ProjectEditRequest $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('project.index')
            ->with('success', 'Proyecto actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('project.index')
            ->with('success', 'Proyecto eliminado satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\MunicipalitiesImport;
use App\Models\Municipality;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MunicipalityController extends Controller
{
    public function index()
    {
        $municipalities = DB::table('municipalities')->simplepaginate(20);
        //DB::table('municipalities')->get()
        //with('projects')->simplepaginate(20)
        return view('municipality.index',compact('municipalities'));
    }

    public function create()
    {
        $municipality = new Municipality();
        $projects = Project::all();
        return view('municipality.create',compact('municipality', 'projects'));
    }

    public function store(Request $request)
    {
        $municipality = Municipality::create($request->all());
        if($request->projects){
            $municipality->projects()->attach($request->projects);
        }
        
        return redirect()->route('municipality.index')
            ->with('success', 'Municipio creado satisfactoriamente.');
    }

    public function show($id)
    {
        $municipality = Municipality::find($id);
        return view('municipality.show',compact('municipality'));
    }

    public function edit($id)
    {
        $municipality = Municipality::find($id);
        $projects = Project::all();
        return view('municipality.edit',compact('municipality','projects'));
    }

    public function update(Request $request, Municipality $municipality)
    {
        $municipality->update($request->all());
        if($request->projects ==null){
            $municipality->projects()->detach();
        }elseif($request->projects != null)
        {
            $municipality->projects()->sync($request->projects);
        }
        return redirect()->route('municipality.index')
            ->with('success', 'Municipio actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Municipality::find($id)->delete();
        return redirect()->route('municipality.index')
            ->with('success', 'Municipio eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('municipality.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new MunicipalitiesImport, $file);
        return redirect()->route('municipality.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

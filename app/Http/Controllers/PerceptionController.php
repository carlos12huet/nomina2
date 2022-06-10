<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerCreateRequest;
use App\Http\Requests\PerEditRequest;
use App\Imports\PerceptionsImport;
use App\Models\Perception;
use App\Models\Satperception;
use App\Models\Sihae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PerceptionController extends Controller
{
    public function index()
    {
        $perceptions = DB::table('perceptions')->Simplepaginate(10);
        return view('perception.index',compact('perceptions'));
    }

    public function create()
    {
        $perception = new Perception();
        $satperceptions = Satperception::pluck('nombre','id');
        $sihaes = Sihae::all();
        return view('perception.create',compact('perception','satperceptions','sihaes'));
    }

    public function store(PerCreateRequest $request)
    {
        $perception = Perception::create($request->all());
        if($request->sihaes){
            $perception->sihaes()->attach($request->sihaes);
        }
        return redirect()->route('perception.index')
            ->with('success', 'Percepcion creada satisfactoriamente.');
    }

    public function show($id)
    {
        $perception = Perception::find($id);
        return view('perception.show',compact('perception'));
    }

    public function edit($id)
    {
        $perception = Perception::find($id);
        $satperceptions = Satperception::pluck('nombre','id');
        $sihaes = Sihae::all();
        return view('perception.edit',compact('perception','satperceptions','sihaes'));
    }

    public function update(PerEditRequest $request, Perception $perception)
    {
        $perception->update($request->all());
        if($request->sihaes){
            $perception->sihaes()->sync($request->sihaes);
        }
        return redirect()->route('perception.index')
            ->with('success', 'Percepcion actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Perception::find($id)->delete();
        return redirect()->route('perception.index')
            ->with('success', 'Percepcion eliminada satisfactoriamente');
    }

    public function import()
    {
        return view('perception.import-excel');
    }

    public function saveimport(Request $request)
    {
        
        $file = $request->file('import');
        //$import = new PerceptionsImport;
        //$import->import($file);
        Excel::import(new PerceptionsImport, $file);
        return redirect()->route('perception.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

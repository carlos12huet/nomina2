<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegimeCreateRequest;
use App\Http\Requests\RegimeEditRequest;
use App\Imports\RegimesImport;
use App\Models\Regime;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RegimeController extends Controller
{
    public function index()
    {
        
        $regimes = DB::table('regimes')->Simplepaginate(10);
        return view('regime.index',compact('regimes'));
    }

    public function create()
    {
        $regime = new Regime();
        return view('regime.create',compact('regime'));
    }

    public function store(RegimeCreateRequest $request)
    {
        Regime::create($request->all());
        return redirect()->route('regime.index')
            ->with('success', 'Regimen creado satisfactoriamente.');
    }

    public function show($id)
    {
        $regime = Regime::find($id);
        return view('regime.show',compact('regime'));
    }

    public function edit($id)
    {
        $regime = Regime::find($id);
        return view('regime.edit',compact('regime'));
    }

    public function update(RegimeEditRequest $request, Regime $regime)
    {
        $regime->update($request->all());
        return redirect()->route('regime.index')
            ->with('success', 'Regimen actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Regime::find($id)->delete();
        return redirect()->route('regime.index')
            ->with('success', 'Regimen eliminado satisfactoriamente');
    }
    public function import()
    {
        return view('regime.import-excel');
    }

    public function saveimport(Request $request)
    {
        
        $file = $request->file('import');
        Excel::import(new RegimesImport, $file);
        return redirect()->route('regime.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SatdedCreateRequest;
use App\Http\Requests\SatdedEditRequest;
use App\Imports\SatdeductionsImport;
use App\Models\Satdeduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SatdeductionController extends Controller
{
    public function index()
    {
        $satdeductions = DB::table('satdeductions')->Simplepaginate(10);
        return view('satdeduction.index',compact('satdeductions'));
    }

    public function create()
    {
        $satdeduction = new Satdeduction();
        return view('satdeduction.create',compact('satdeduction'));
    }

    public function store(SatdedCreateRequest $request)
    {
        Satdeduction::create($request->all());
        return redirect()->route('satdeduction.index')
            ->with('success', 'Deduccion creada satisfactoriamente.');
    }

    public function show($id)
    {
        $satdeduction = Satdeduction::find($id);
        return view('satdeduction.show',compact('satdeduction'));
    }

    public function edit($id)
    {
        $satdeduction = Satdeduction::find($id);
        return view('satdeduction.edit',compact('satdeduction'));
    }

    public function update(SatdedEditRequest $request, Satdeduction $satdeduction)
    {
        $satdeduction->update($request->all());
        return redirect()->route('satdeduction.index')
            ->with('success', 'Deduccion actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Satdeduction::find($id)->delete();
        return redirect()->route('satdeduction.index')
            ->with('success', 'Deduccion eliminada satisfactoriamente');
    }

    public function import()
    {
        return view('satdeduction.import-excel');
    }

    public function saveimport(Request $request)
    {
        
        $file = $request->file('import');
        Excel::import(new SatdeductionsImport, $file);
        return redirect()->route('satdeduction.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

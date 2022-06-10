<?php

namespace App\Http\Controllers;

use App\Http\Requests\DedCreateRequest;
use App\Http\Requests\DedEditRequest;
use App\Imports\DeductionsImport;
use App\Models\Deduction;
use App\Models\Satdeduction;
use App\Models\Sihae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DeductionController extends Controller
{
    public function index()
    {
        $deductions = DB::table('deductions')->Simplepaginate(10);
        return view('deduction.index',compact('deductions'));
    }

    public function create()
    {
        $deduction = new Deduction();
        
        $satdeductions = Satdeduction::pluck('nombre','id');
        $sihaes = Sihae::all();
        return view('deduction.create',compact('deduction','satdeductions','sihaes'));
    }

    public function store(DedCreateRequest $request)
    {
        $deduction = Deduction::create($request->all());
        if($request->sihaes){
            $deduction->sihaes()->attach($request->sihaes);
        }
        return redirect()->route('deduction.index')
            ->with('success', 'Deduccion creado satisfactoriamente.');
    }

    public function show($id)
    {
        $deduction = Deduction::find($id);
        return view('deduction.show',compact('deduction'));
    }

    public function edit($id)
    {
        $deduction = Deduction::find($id);
        $satdeductions = Satdeduction::pluck('nombre','id');
        $sihaes = Sihae::all();
        return view('deduction.edit',compact('deduction','satdeductions','sihaes'));
    }

    public function update(DedEditRequest $request, Deduction $deduction)
    {
        $deduction->update($request->all());
        if($request->sihaes){
            $deduction->sihaes()->detach();
            $deduction->sihaes()->attach($request->sihaes);
        }
        return redirect()->route('deduction.index')
            ->with('success', 'Deduccion actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Deduction::find($id)->delete();
        return redirect()->route('deduction.index')
            ->with('success', 'Deduccion eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('deduction.import-excel');
    }

    public function saveimport(Request $request)
    {
        
        $file = $request->file('import');
        Excel::import(new DeductionsImport, $file);
        return redirect()->route('deduction.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

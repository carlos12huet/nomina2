<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxCreateRequest;
use App\Http\Requests\TaxEditRequest;
use App\Imports\TaxsImport;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TaxController extends Controller
{
    public function index()
    {
        $taxs = DB::table('taxs')->Simplepaginate(10);
        return view('tax.index',compact('taxs'));
    }

    public function create()
    {
        $tax = new Tax();
        return view('tax.create',compact('tax'));
    }

    public function store(TaxCreateRequest $request)
    {
        Tax::create($request->all());
        return redirect()->route('tax.index')
            ->with('success', 'Regimen Fiscal creado satisfactoriamente.');
    }

    public function show($id)
    {
        $tax = Tax::find($id);
        return view('tax.show',compact('tax'));
    }

    public function edit($id)
    {
        $tax = Tax::find($id);
        return view('tax.edit',compact('tax'));
    }

    public function update(TaxEditRequest $request, Tax $tax)
    {
        $tax->update($request->all());
        return redirect()->route('tax.index')
            ->with('success', 'Regimen fiscal actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Tax::find($id)->delete();
        return redirect()->route('tax.index')
            ->with('success', 'Regimen fiscal eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('tax.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new TaxsImport, $file);
        return redirect()->route('tax.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TcontractCreateRequest;
use App\Http\Requests\TcontractEditRequest;
use App\Imports\TcontractsImport;
use App\Models\Tcontract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TcontractController extends Controller
{
    public function index()
    {
        $tcontracts = DB::table('tcontracts')->Simplepaginate(10);
        return view('tcontract.index',compact('tcontracts'));
    }

    public function create()
    {
        $tcontract = new Tcontract();
        return view('tcontract.create',compact('tcontract'));
    }

    public function store(TcontractCreateRequest $request)
    {
        Tcontract::create($request->all());
        return redirect()->route('tcontract.index')
            ->with('success', 'Contrato creado satisfactoriamente.');
    }

    public function show($id)
    {
        $tcontract = Tcontract::find($id);
        return view('tcontract.show',compact('tcontract'));
    }

    public function edit($id)
    {
        $tcontract = Tcontract::find($id);
        return view('tcontract.edit',compact('tcontract'));
    }

    public function update(TcontractEditRequest $request, Tcontract $tcontract)
    {
        $tcontract->update($request->all());
        return redirect()->route('tcontract.index')
            ->with('success', 'Contrato actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Tcontract::find($id)->delete();
        return redirect()->route('tcontract.index')
            ->with('success', 'Contrato eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('tcontract.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new TcontractsImport, $file);
        return redirect()->route('tcontract.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

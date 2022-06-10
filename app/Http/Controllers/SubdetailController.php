<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCreateRequest;
use App\Imports\SubdetailsImport;
use App\Models\Subdetail;
use App\Models\Subsidy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SubdetailController extends Controller
{
    public function index()
    {
        $subdetails = Subdetail::with('subsidy')->Simplepaginate(11);
        return view('subdetail.index',compact('subdetails'));
    }

    public function create()
    {
        $subdetail = new Subdetail();
        $subsidies = Subsidy::pluck('clave','id');
        return view('subdetail.create',compact('subdetail','subsidies'));
    }

    public function store(SubCreateRequest $request)
    {
        Subdetail::create($request->all());
        return redirect()->route('subsidy.index')
            ->with('success', 'Subsidio creado satisfactoriamente.');
    }

    public function show($id)
    {
        $subdetail = Subdetail::find($id);
        return view('subdetail.show',compact('subdetail'));
    }

    public function edit($id)
    {
        $subdetail = Subdetail::find($id);
        $subsidies = Subsidy::pluck('clave','id');
        return view('subdetail.edit',compact('subdetail','subsidies'));
    }

    public function update(SubCreateRequest $request, Subdetail $subdetail)
    {
        $subdetail->update($request->all());
        return redirect()->route('subdetail.index')
            ->with('success', 'Subsidio actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Subdetail::find($id)->delete();
        return redirect()->route('subdetail.index')
            ->with('success', 'Subsidio eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('subdetail.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new SubdetailsImport, $file);
        return redirect()->route('subsidy.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

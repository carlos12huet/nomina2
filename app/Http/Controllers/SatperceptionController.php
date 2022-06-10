<?php

namespace App\Http\Controllers;

use App\Http\Requests\SatperCrtRequest;
use App\Http\Requests\SatperRequest;
use App\Imports\SatperceptionsImport;
use App\Models\Satperception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SatperceptionController extends Controller
{
    public function index()
    {
        $satperceptions = DB::table('satperceptions')->Simplepaginate(10);
        return view('satperception.index',compact('satperceptions'));
    }

    public function create()
    {
        $satperception = new Satperception();
        return view('satperception.create',compact('satperception'));
    }

    public function store(SatperCrtRequest $request)
    {
        Satperception::create($request->all());
        return redirect()->route('satperception.index')
            ->with('success', 'Percepcion creada satisfactoriamente.');
    }

    public function show($id)
    {
        $satperception = Satperception::find($id);
        return view('satperception.show',compact('satperception'));
    }

    public function edit($id)
    {
        $satperception = Satperception::find($id);
        return view('satperception.edit',compact('satperception'));
    }

    public function update(SatperRequest $request, Satperception $satperception)
    {
        $satperception->update($request->all());
        return redirect()->route('satperception.index')
            ->with('success', 'Percepcion actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Satperception::find($id)->delete();
        return redirect()->route('satperception.index')
            ->with('success', 'Percepcion eliminada satisfactoriamente');
    }

    public function import()
    {
        return view('satperception.import-excel');
    }

    public function saveimport(Request $request)
    {
        
        $file = $request->file('import');
        Excel::import(new SatperceptionsImport, $file);
        return redirect()->route('satperception.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

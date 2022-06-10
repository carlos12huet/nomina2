<?php

namespace App\Http\Controllers;

use App\Http\Requests\SihaeCreateRequest;
use App\Http\Requests\SihaeEditRequest;
use App\Imports\SihaesImport;
use App\Models\Sihae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SihaeController extends Controller
{
    public function index()
    {
        $sihaes = DB::table('sihaes')->Simplepaginate(10);
        return view('sihae.index',compact('sihaes'));
    }

    public function create()
    {
        $sihae = new Sihae();
        return view('sihae.create',compact('sihae'));
    }

    public function store(SihaeCreateRequest $request)
    {
        Sihae::create($request->all());
        return redirect()->route('sihae.index')
            ->with('success', 'SIHAE creado satisfactoriamente.');
    }

    public function show($id)
    {
        $sihae = Sihae::find($id);
        return view('sihae.show',compact('sihae'));
    }

    public function edit($id)
    {
        $sihae = Sihae::find($id);
        return view('sihae.edit',compact('sihae'));
    }

    public function update(SihaeEditRequest $request, Sihae $sihae)
    {
        $sihae->update($request->all());
        return redirect()->route('sihae.index')
            ->with('success', 'SIHAE actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Sihae::find($id)->delete();
        return redirect()->route('sihae.index')
            ->with('success', 'SIHAE eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('sihae.import-excel');
    }

    public function saveimport(Request $request)
    {
        
        $file = $request->file('import');
        Excel::import(new SihaesImport, $file);
        return redirect()->route('sihae.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

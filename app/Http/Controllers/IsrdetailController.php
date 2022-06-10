<?php

namespace App\Http\Controllers;

use App\Http\Requests\isrRequest;
use App\Imports\IsrdetailsImport;
use App\Models\Isr;
use App\Models\Isrdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class IsrdetailController extends Controller
{
    public function index()
    {
        //$Isrdetails = DB::table('Isrdetails')->Simplepaginate(10);
        $isrdetails = Isrdetail::with('isr')
        //->where('isrdetails.isr_id',$isr)
        ->Simplepaginate(11);
        return view('isrdetail.index',compact('isrdetails'));
    }

    public function create()
    {
        
        $isrdetail = new Isrdetail();
        $isrs = Isr::pluck('clave','id');
        return view('isrdetail.create',compact('isrdetail','isrs'));
    }

    public function store(Request $request)
    {
        Isrdetail::create($request->all());
        return redirect()->route('isr.index')
            ->with('success', 'Creado satisfactoriamente.');
    }

    public function show($id)
    {
        $isrdetail = Isrdetail::find($id);
        return view('isrdetail.show',compact('isrdetail'));
    }

    public function edit($id)
    {
        $isrdetail = Isrdetail::find($id);
        $isrs = Isr::pluck('clave','id');
        return view('isrdetail.edit',compact('isrdetail','isrs'));
    }

    public function update(Request $request, Isrdetail $isrdetail)
    {
        $isrdetail->update($request->all());
        return redirect()->route('isrdetail.index')
            ->with('success', 'Actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Isrdetail::find($id)->delete();
        return redirect()->route('isrdetail.index')
            ->with('success', 'Eliminado satisfactoriamente');
    }

    public function import()
    {  
        /*$valor = 12000;
        $consulta = Isrdetail::where('lim_inf','<=',$valor)
        ->where('lim_sup','>=',$valor)->first();*/
        return view('isrdetail.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new IsrdetailsImport, $file);
        return redirect()->route('isr.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

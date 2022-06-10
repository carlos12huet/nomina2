<?php

namespace App\Http\Controllers;

use App\Http\Requests\TabdetRequest;
use App\Imports\TabdetailsImport;
use App\Models\Position;
use App\Models\Tab;
use App\Models\Tabdetail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TabdetailController extends Controller
{
    public function index()
    {
        $tabdetails = Tabdetail::with('tab','position')->Simplepaginate(10);
        return view('tabdetail.index',compact('tabdetails'));
    }

    public function create()
    {
        $tabdetail = new Tabdetail();
        $tabs = Tab::pluck('clave','id');
        $positions = Position::pluck('nombre','id');
        //$setting = DB::table('settings')->where('nombre','like','%'.'incremento'.'%')->where('status',1)->get('valor');
        return view('tabdetail.create',compact('tabdetail','tabs','positions'));
    }

    public function store(TabdetRequest $request)
    {
        Tabdetail::create($request->all());
        return redirect()->route('tab.index')
            ->with('success', 'Creado satisfactoriamente.');
    }

    public function show($id)
    {
        $tabdetail = Tabdetail::find($id);
        return view('tabdetail.show',compact('tabdetail'));
    }

    public function edit($id)
    {
        $tabdetail = Tabdetail::find($id);
        $tabs = Tab::pluck('clave','id');
        $positions = Position::pluck('nombre','id');
        return view('tabdetail.edit',compact('tabdetail','tabs','positions'));
    }

    public function update(TabdetRequest $request, Tabdetail $tabdetail)
    {
        $tabdetail->update($request->all());
        return redirect()->route('tabdetail.index')
            ->with('success', 'Actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Tabdetail::find($id)->delete();
        return redirect()->route('tabdetail.index')
            ->with('success', 'Eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('tabdetail.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new TabdetailsImport, $file);
        return redirect()->route('tab.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

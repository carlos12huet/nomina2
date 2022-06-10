<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodCreateRequest;
use App\Http\Requests\PeriodEditRequest;
use App\Imports\PeriodsImport;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = DB::table('periods')->Simplepaginate(10);
        return view('period.index',compact('periods'));
    }

    public function create()
    {
        $period = new Period();
        return view('period.create',compact('period'));
    }

    public function store(PeriodCreateRequest $request)
    {
        Period::create($request->all());
        return redirect()->route('period.index')
            ->with('success', 'Periodo creado satisfactoriamente.');
    }

    public function show($id)
    {
        $period = Period::find($id);
        return view('period.show',compact('period'));
    }

    public function edit($id)
    {
        $period = Period::find($id);
        return view('period.edit',compact('period'));
    }

    public function update(PeriodEditRequest $request, Period $period)
    {
        $period->update($request->all());
        return redirect()->route('period.index')
            ->with('success', 'Periodo actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Period::find($id)->delete();
        return redirect()->route('period.index')
            ->with('success', 'Periodo eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('period.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new PeriodsImport, $file);
        return redirect()->route('period.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

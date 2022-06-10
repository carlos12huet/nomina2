<?php

namespace App\Http\Controllers;

use App\Models\Workday;

use App\Http\Requests\WorkdayCreateRequest;
use App\Http\Requests\WorkdayEditRequest;
use App\Imports\WorkdaysImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class WorkdayController extends Controller
{
    public function index()
    {
        $workdays = DB::table('workdays')->Simplepaginate(10);
        return view('workday.index',compact('workdays'));
    }

    public function create()
    {
        $workday = new Workday();
        return view('workday.create',compact('workday'));
    }

    public function store(WorkdayCreateRequest $request)
    {
        Workday::create($request->all());
        return redirect()->route('workday.index')
            ->with('success', 'Jornada creada satisfactoriamente.');
    }

    public function show($id)
    {
        $workday = Workday::find($id);
        return view('workday.show',compact('workday'));
    }

    public function edit($id)
    {
        $workday = Workday::find($id);
        return view('workday.edit',compact('workday'));
    }

    public function update(WorkdayEditRequest $request, Workday $workday)
    {
        $workday->update($request->all());
        return redirect()->route('workday.index')
            ->with('success', 'Jornada actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Workday::find($id)->delete();
        return redirect()->route('workday.index')
            ->with('success', 'Jornada eliminada satisfactoriamente');
    }

    public function import()
    {
        return view('workday.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new WorkdaysImport, $file);
        return redirect()->route('workday.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

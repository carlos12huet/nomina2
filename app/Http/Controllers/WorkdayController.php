<?php

namespace App\Http\Controllers;

use App\Models\Workday;

use App\Http\Requests\WorkdayCreateRequest;
use App\Http\Requests\WorkdayEditRequest;
use Illuminate\Support\Facades\DB;

class WorkdayController extends Controller
{
    public function index()
    {
        $workdays = DB::table('workdays')->Simplepaginate(5);
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
            ->with('success', 'Regimen Fiscal creado satisfactoriamente.');
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
            ->with('success', 'Regimen fiscal actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Workday::find($id)->delete();
        return redirect()->route('workday.index')
            ->with('success', 'regime eliminado satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubsidieEditRequest;
use App\Http\Requests\SubsidieRequest;
use App\Models\Subsidy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubsidyController extends Controller
{
    public function index()
    {
        
        $subsidies = DB::table('subsidies')->Simplepaginate(10);
        return view('subsidy.index',compact('subsidies'));
    }

    public function create()
    {
        $subsidy = new Subsidy();
        return view('subsidy.create',compact('subsidy'));
    }

    public function store(SubsidieRequest $request)
    {
        Subsidy::create($request->all());

        return redirect()->route('subdetail.create')
            ->with('success', 'Subsidio creado satisfactoriamente.');
    }

    public function show($id)
    {
        $subsidy = Subsidy::find($id);
        return view('subsidy.show',compact('subsidy'));
    }

    public function edit($id)
    {
        $subsidy = Subsidy::find($id);
        return view('subsidy.edit',compact('subsidy'));
    }

    public function update(SubsidieEditRequest $request, Subsidy $subsidy)
    {
        $subsidy->update($request->all());
        return redirect()->route('subsidy.index')
            ->with('success', 'Subsidio actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Subsidy::find($id)->delete();
        return redirect()->route('subsidy.index')
            ->with('success', 'Subsidio eliminado satisfactoriamente');
    }
}

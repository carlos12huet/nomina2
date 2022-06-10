<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionCreateRequest;
use App\Http\Requests\PositionEditRequest;
use App\Imports\PositionsImport;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PositionController extends Controller
{
    public function index()
    {
        $positions = DB::table('positions')->Simplepaginate(10);
        return view('position.index',compact('positions'));
    }

    public function create()
    {
        $position = new Position();
        $departments = Department::all();
        return view('position.create',compact('position','departments'));
    }

    public function store(PositionCreateRequest $request)
    {
        $position = Position::create($request->all());
        if($request->departments){
            $position->departments()->attach($request->departments);
        }
        return redirect()->route('position.index')
            ->with('success', 'Puesto creado satisfactoriamente.');
    }

    public function show($id)
    {
        $position = Position::find($id);
        return view('position.show',compact('position'));
    }

    public function edit($id)
    {
        $position = Position::find($id);
        $departments = Department::all();
        return view('position.edit',compact('position','departments'));
    }

    public function update(PositionEditRequest $request, Position $position)
    {
        $position->update($request->all());
        if($request->departments){
            $position->departments()->detach();
            $position->departments()->attach($request->departments);
        }
        return redirect()->route('position.index')
            ->with('success', 'Puesto actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Position::find($id)->delete();
        return redirect()->route('position.index')
            ->with('success', 'Puesto eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('position.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new PositionsImport, $file);
        return redirect()->route('position.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

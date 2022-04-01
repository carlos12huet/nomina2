<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionCreateRequest;
use App\Http\Requests\PositionEditRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function index()
    {
        $positions = DB::table('positions')->Simplepaginate(5);
        return view('position.index',compact('positions'));
    }

    public function create()
    {
        $position = new Position();
        return view('position.create',compact('position'));
    }

    public function store(PositionCreateRequest $request)
    {
        Position::create($request->all());
        return redirect()->route('position.index')
            ->with('success', 'Regimen Fiscal creado satisfactoriamente.');
    }

    public function show($id)
    {
        $position = Position::find($id);
        return view('position.show',compact('position'));
    }

    public function edit($id)
    {
        $position = Position::find($id);
        return view('position.edit',compact('position'));
    }

    public function update(PositionEditRequest $request, Position $position)
    {
        $position->update($request->all());
        return redirect()->route('position.index')
            ->with('success', 'Regimen fiscal actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Position::find($id)->delete();
        return redirect()->route('position.index')
            ->with('success', 'Regimen fiscal eliminado satisfactoriamente');
    }
}

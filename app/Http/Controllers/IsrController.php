<?php

namespace App\Http\Controllers;

use App\Http\Requests\isrCreateRequest;
use App\Http\Requests\isrEditRequest;
use App\Models\Isr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsrController extends Controller
{
    public function index()
    {
        $isrs = DB::table('isr')->Simplepaginate(10);
        return view('isr.index',compact('isrs'));
    }

    public function create()
    {
        $isr = new Isr();
        return view('isr.create',compact('isr'));
    }

    public function store(isrCreateRequest $request)
    {
        Isr::create($request->all());

        return redirect()->route('isrdetail.create')
            ->with('success', 'ISR creado satisfactoriamente.');
    }

    public function show($id)
    {
        $isr = Isr::find($id);
        return view('isr.show',compact('isr'));
    }

    public function edit($id)
    {
        $isr = Isr::find($id);
        return view('isr.edit',compact('isr'));
    }

    public function update(isrEditRequest $request, Isr $isr)
    {
        $isr->update($request->all());
        return redirect()->route('isr.index')
            ->with('success', 'ISR actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Isr::find($id)->delete();
        return redirect()->route('isr.index')
            ->with('success', 'ISR eliminado satisfactoriamente');
    }
}

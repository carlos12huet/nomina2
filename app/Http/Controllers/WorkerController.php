<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerCreateRequest;
use App\Http\Requests\WorkerEditRequest;
use App\Imports\WorkersImport;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class WorkerController extends Controller
{
    
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        //$status = $request->get('status');
        $workers = DB::table('workers')
        /*->when($this->status,function($query)
        {
            return $query->where('status',1);
        })*/
        ->where('nombre','like','%'.$buscarpor.'%')
        ->orWhere('rfc','like','%'.$buscarpor.'%')
        ->Simplepaginate(10);
        return view('worker.index',compact('workers','buscarpor'));
    }

    public function create()
    {
        $worker = new Worker();
        return view('worker.create',compact('worker'));
    }

    public function store(WorkerCreateRequest $request)
    {
        Worker::create($request->all());
        return redirect()->route('worker.index')
            ->with('success', 'Trabajador creado satisfactoriamente.');
    }

    public function show($id)
    {
        $worker = Worker::find($id);
        return view('worker.show',compact('worker'));
    }

    public function edit($id)
    {
        $worker = Worker::find($id);
        return view('worker.edit',compact('worker'));
    }

    public function update(WorkerEditRequest $request, Worker $worker)
    {
        $worker->update($request->all());
        return redirect()->route('worker.index')
            ->with('success', 'Trabajador actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Worker::find($id)->delete();
        return redirect()->route('worker.index')
            ->with('success', 'Trabajador eliminado satisfactoriamente');
    }

    public function import()
    {
        return view('worker.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new WorkersImport, $file);
        return redirect()->route('worker.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContCreateRequest;
use App\Http\Requests\ContEditRequest;
use App\Models\Contract;
use App\Models\Deduction;
use App\Models\Department;
use App\Models\Municipality;
use App\Models\Perception;
use App\Models\Period;
use App\Models\Position;
use App\Models\Project;
use App\Models\Regime;
use App\Models\Tax;
use App\Models\Tcontract;
use App\Models\Workday;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('worker','position')->Simplepaginate(10);
        return view('contract.index',compact('contracts'));
    }

    public function create()
    {
        $contract = new Contract();
        $workers = Worker::where('status',1)->pluck('rfc','id');
        $regimes = Regime::pluck('nombre','id');
        $taxs = Tax::pluck('nombre','id');
        $workdays = Workday::pluck('nombre','id');
        $tcontracts = Tcontract::pluck('nombre','id');
        $municipalities = Municipality::pluck('nombre','id');
        $projects = Project::pluck('nombre','id');
        $departments = Department::pluck('nombre','id');
        $positions = Position::pluck('nombre','id');
        $periods = Period::pluck('nombre','id');
        $perceptions = Perception::all()->where('tipo','<=',2);
        $deductions = Deduction::all()->where('tipo','<=',2);
        return view('contract.create',compact('contract','tcontracts','workers','regimes','taxs','workdays','tcontracts','projects','positions','departments','municipalities','periods','perceptions','deductions'));
    }

    public function store(ContCreateRequest $request)
    {
        $comp1 = $request->worker_id;
        $comp = Contract::where('worker_id',$comp1)
        ->where('status',1)->first();

        if($comp == null)
        {
            $contracts = Contract::create($request->all());
            if($request->perceptions){
                $contracts->perceptions()->attach($request->perceptions);
            }
            if($request->deductions){
                $contracts->deductions()->attach($request->deductions);
            }
            return redirect()->route('contract.index')
            ->with('success', 'Contrato creado satisfactoriamente.');
        }
        elseif($comp->worker_id == $comp1)
        {
            return redirect()->route('contract.index')
            ->with('success', 'Verificar que anterior contrato este inactivo');    
        }
    }

    public function show($id)
    {
        $contract = Contract::find($id);
        return view('contract.show',compact('contract'));
    }

    public function edit($id)
    {
        $contract = Contract::find($id);
        $workers = Worker::where('status',1)->pluck('nombre','id');
        $regimes = Regime::pluck('nombre','id');
        $taxs = Tax::pluck('nombre','id');
        $workdays = Workday::pluck('nombre','id');
        $tcontracts = Tcontract::pluck('nombre','id');
        $municipalities = Municipality::pluck('nombre','id');
        $projects = Project::pluck('nombre','id');
        $departments = Department::pluck('nombre','id');
        $positions = Position::pluck('nombre','id');
        $periods = Period::pluck('nombre','id');
        $perceptions = Perception::all()->where('tipo','<=',2);
        $deductions = Deduction::all()->where('tipo','<=',2);
        return view('contract.edit',compact('contract','tcontracts','workers','regimes','taxs','workdays','tcontracts','projects','positions','departments','municipalities','periods','perceptions','deductions'));
    }

    public function update(ContEditRequest $request, Contract $contract)
    {
        $contract->update($request->all());
        if($request->perceptions == null){
            $contract->perceptions()->detach();
        }
        else
        {
            $contract->perceptions()->sync($request->perceptions);
            return redirect()->route('contract.index')
            ->with('success', 'Contrato actualizado satisfactoriamente');
        }
        if($request->deductions == null){
            $contract->deductions()->detach();
            return redirect()->route('contract.index')
            ->with('success', 'Contrato actualizado satisfactoriamente');
        }
        else
        {
            $contract->deductions()->sync($request->deductions);
            return redirect()->route('contract.index')
            ->with('success', 'Contrato actualizado satisfactoriamente');
        }
        return redirect()->route('contract.index')
            ->with('success', 'Contrato actualizado satisfactoriamente');
        
    }

    public function destroy($id)
    {
        Contract::find($id)->delete();
        return redirect()->route('contract.index')
            ->with('success', 'Contrato eliminado satisfactoriamente');
    }
}

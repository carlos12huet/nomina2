<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayrollCreateRequest;
use App\Http\Requests\PayrollEditRequest;
use App\Models\Paydetail;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = DB::table('payrolls')->Simplepaginate(10);
        return view('payroll.index',compact('payrolls'));
    }

    public function create()
    {
        $payroll = new Payroll();
        return view('payroll.create',compact('payroll'));
    }

    public function store(PayrollCreateRequest $request)
    {
        $payroll = Payroll::create($request->all());
        $tab = DB::table('payrolls')->orderByDesc('id')->first();
        $tipo = $tab->tipo;
        if($tipo == 4)
        {
            $prueba = new OperationController;
            $prueba->aguinaldo();
            return redirect()->route('payroll.index')
            ->with('success', 'Nomina creada satisfactoriamente.');
        }
        else
        {
            return redirect()->route('paydetail.create');
        }
    }

    public function show($id)
    {
        $payroll = Payroll::find($id);
        $pay = Payroll::where('id',$id)->first();
        $paydetails = Paydetail::where('payroll_id',$pay->id)->get();
        return view('payroll.show',compact('payroll','paydetails'));
    }

    public function edit($id)
    {
        $payroll = Payroll::find($id);
        return view('payroll.edit',compact('payroll'));
    }

    public function update(PayrollEditRequest $request, Payroll $payroll)
    {
        $payroll->update($request->all());
        return redirect()->route('payroll.index')
            ->with('success', 'Nomina actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Payroll::find($id)->delete();
        return redirect()->route('payroll.index')
            ->with('success', 'Nomina eliminada satisfactoriamente');
    }
}

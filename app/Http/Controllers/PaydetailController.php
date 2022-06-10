<?php

namespace App\Http\Controllers;

use App\Exports\PaydetailsExport;
use App\Http\Requests\PayRequest;
use App\Models\Contract;
use App\Models\Municipality;
use App\Models\Paydetail;
use App\Models\Payroll;
use App\Models\Perception;
use App\Models\Worker;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Days360;

class PaydetailController extends Controller
{
    public function index()
    {
        $paydetails = Paydetail::with('contract','payroll')->Simplepaginate(10);
        return view('paydetail.index',compact('paydetails'));
    }

    public function create()
    {
        /*$proyectos = Project::join('contracts as c','c.project_id','=','projects.id')
        ->join('paydetails as p','p.contract_id','=','c.id')
        ->join('payrolls as pr','pr.id','=','p.payroll_id')
        ->where('projects.id',1)
        ->orderBy('pr.id')
        //->sum('p.monto_total')
        ->get();*/
        /*$municipios = Payroll::all();
        
        foreach($municipios as $municipio)
        {
            $munis = Municipality::join('contracts as c','c.municipality_id','=','municipalities.id')
            ->join('paydetails as p','p.contract_id','=','c.id')
            ->join('payrolls as pr','pr.id','=','p.payroll_id')
            ->where('municipalities.id',$municipio)
            //->where('pr.id',8)
            //->orderBy('pr.id')
            ->get();
            $munis = Contract::join('paydetails as pd','pd.contract_id','=','contracts.id')
            ->join('payrolls as p', 'p.id','=','pd.payroll_id')
            ->where('p.id',$municipio->id)
            ->sum('pd.monto_total')
            //->select('pd.monto_total')
            //->get()
            ;
            
            
            
        }
        return $munis;*/
        $contracts = Contract::where('status',1)->count('id');
        for($i = 0; $i<$contracts; $i++)
        {
            $payrolls = Payroll::orderBy('id','desc')->pluck('clave','id');
            $contracts = Contract::join('workers as w','w.id','=','contracts.worker_id')
            ->where('contracts.status',1)->pluck('w.nombre','contracts.id');
            $paydetail = new Paydetail();
            return view('paydetail.create',compact('paydetail','contracts','payrolls'));
        }
    }

    public function store(Request $request)
    {
        /*$prieba = new OperationController();
        return $prieba->imss_con($request);*/
        //return $prieba;

        $payr = $request->payroll_id;
        
        $tpn = Payroll::where('id',$payr)->first();//tipo de nomina
        
        
        $tp = Contract::where('id',$request->contract_id)->first();//empleado

        if($tpn->tipo == 1 and $tp->sindicalizado == 1)
        {
            $normalsin = new OperationController;
            $normalsin->normal_sindicalizado($request);
        }
        elseif($tpn->tipo == 1 and $tp->sindicalizado == 0)
        {
            $normalcon = new OperationController;
            $normalcon->normal_confianza($request);
        }

        return redirect()->route('paydetail.index')
            ->with('success', 'Nomina creado satisfactoriamente.');
    }

    public function show($id)
    {
        $perceptions = Perception::all();
        $paydetail = Paydetail::find($id);
        /*$date = Carbon::now('America/Mexico_City');
        $actual = $date->format('Y-m-d');
        $dia = $date->format('d');
        $mes = $date->format('m');
        $ano = $date->format('Y');
        if($dia > 15 and $dia <= 30)
        {
            $dia2= '30';
            $fechaactual = $ano.'-'.$mes.'-'.$dia2;
        }
        return $fechaactual;*/
        return view('paydetail.show',compact('paydetail','perceptions'));
    }

    public function edit($id)
    {
        $paydetail = Paydetail::find($id);
        return view('paydetail.edit',compact('paydetail'));
    }

    public function update(PayRequest $request, Paydetail $paydetail)
    {
        $paydetail->update($request->all());
        return redirect()->route('paydetail.index')
            ->with('success', 'Nomina actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Paydetail::find($id)->delete();
        return redirect()->route('paydetail.index')
            ->with('success', 'Nomina eliminado satisfactoriamente');
    }
    
    #expotacion
        public function export()
        {
            $payrolls = Payroll::pluck('clave','id');
            return view('paydetail.export',compact('payrolls'));
        }

        public function exportable(Request $request)
        {
            //return $request->payroll_id;
            ini_set('memory_limit','-1');
            set_time_limit('30000');
            return (new PaydetailsExport($request->payroll_id))->download('nomina.xlsx');
            //return Excel::download(new PaydetailsExport($request->payroll_id),'nomina.xlsx');
            /*redirect()->route('payroll.index')
                ->with('success', 'Nomina Exportada satisfactoriamente.');*/
        }
    #exportacion
}

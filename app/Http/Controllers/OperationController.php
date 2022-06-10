<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Deduction;
use App\Models\Isr;
use App\Models\Isrdetail;
use App\Models\Paydetail;
use App\Models\Perception;
use App\Models\Setting;
use App\Models\Subdetail;
use App\Models\Subsidy;
use App\Models\Tab;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Days360;

class OperationController extends Controller
{
    #nominanormal
        public function normal_sindicalizado(Request $request)
        {

                    $nomina = new Paydetail();
                    $nomina->contract_id = $request->contract_id;
                    $nomina->payroll_id = $request->payroll_id;
                    $nomina->save();
                    $tp = Contract::where('id',$request->contract_id)->first(); //contrato
                
                    $perceptions = Perception::all();
                    $deductions = Deduction::all();
                    
                    $pg = Tab::join('tabdetails as td','td.tab_id','=','tabs.id')
                    ->where('tabs.status',1)
                    ->where('tabs.sindicalizado',$tp->sindicalizado)
                    ->where('td.position_id',$tp->position_id)
                    ->first();
                    $quin = $pg->sueldo_diario * 15;
                    $men = $pg->sueldo_mensual;
                    $date = Carbon::now('America/Mexico_City');
                    $date = $date->format('m-d');
                        
                    foreach($perceptions as $perception)
                    {
                        
                        switch ($perception->id) {
                            case 1:
                                if($request->compensacion == null){
                                    break;
                                }
                                else
                                {
                                    $nomina->perceptions()->attach(
                                        $perception->id , ['monto' => $request->compensacion]
                                    );
                                    break;   
                                }
                            case 2:
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $quin]
                                );
                                break;
                            case 3:
                                $buscarpor = 'FOMENTO Deportivo';
                                $fomdep = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $fomdep->valor]
                                );
                                break;
                            case 4:
                                $buscarpor = 'FOMENTO cultural';
                                $fomcul = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $fomcul->valor]
                                );
                                break;
                            case 6://extra
                                if(($date >= '05-01') and ($date <= '05-15'))
                                    {
                                        $buscarpor = 'mayo';
                                        $mayo = Setting::where('nombre','like','%'.$buscarpor.'%')
                                        ->where('status',1)->first();
                                        $nomina->perceptions()->attach(
                                            $perception->id , ['monto' => $mayo->valor]
                                        );
                                        break;
                                        
                                    }else{
                                        break;
                                    }
                                
                            //case 10:
                                //$horasextra;
                                //break;
                            case 11:
                                $buscarpor = 'productividad';
                                $prod = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $pro = $quin * $prod->valor;
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $pro]
                                );
                                break;
                            case 13://extra
                                if(($date >= '07-15') and ($date <= '07-30'))
                                {
                                    $buscarpor = 'burocrata';
                                    $buro = Setting::where('nombre','like','%'.$buscarpor.'%')
                                    ->where('status',1)->first();
                                    $nomina->perceptions()->attach(
                                        $perception->id , ['monto' => $buro->valor]
                                    );
                                break;
                                }
                                else{
                                    break;
                                }
                            case 18:// extraor
                                $buscarpor = 'escolares';
                                $esc = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $esc->valor]
                                );
                                break;
                            /*case 19:
                                $buscarpor = 'prevision social';
                                $prv = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $prv->valor]
                                );
                                break;*/
                            case 25:
                                $subsi = $this->isrsin($request,'sub');
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $subsi]
                                );
                                break;
                            /*case :
                                
                                break;
                            case :
                                
                                break;
                            case :
                                
                                break;
                            case :
                                
                                break;*/
                            default:
                                /*$nomina->perceptions()->attach(
                                    $perception->id , ['monto' => 2]
                                );*/
                                break;
                        }   
                    }
                    foreach($deductions as $deduction)
                    {
                        switch ($deduction->id) {
                            case 1://cuota sindical
                                $buscarpor = 'cuota sindical';
                                $cuota = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $pago = $quin * $cuota->valor;
                                $nomina->deductions()->attach(
                                $deduction->id , ['monto' => $pago]
                            );
                                break;
                            case 2: //faltas
                                if($request->faltas == null)
                                {
                                    break;
                                }
                                else
                                {
                                    $buscarpor = 'prevision social';
                                    $prv = Setting::where('nombre','like','%'.$buscarpor.'%')
                                    ->where('status',1)->first();
                                    $comp = $request->compensacion;
                                    $falta = (($men + $comp + $prv->monto)/30) * $request->faltas;
                                    $nomina->deductions()->attach(
                                        $deduction->id , ['monto' => $falta]
                                    );
                                }
                                break;
                            case 4:
                                $buscarpor = 'desplazamiento';
                                $des = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $cuo = $quin * $des->valor;
                                $nomina->deductions()->attach(
                                    $deduction->id , ['monto' => $cuo]
                                );
                                break;
                            case 5:
                                $buscarpor = 'fondo de ahorro';
                                $fon = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $fondo = $quin * $fon->valor;
                                $nomina->deductions()->attach(
                                    $deduction->id , ['monto' => $fondo]
                                );
                                break;    
                            case 6:
                                if($request->infonacot == null)
                                {
                                    break;
                                }else{
                                        $nomina->deductions()->attach(
                                            $deduction->id , ['monto' => $request->infonacot]
                                        );
                                        break;
                                }
                                
                            case 7:
                                if($request->infonavit == null)
                                {
                                    break;
                                }else{
                                        $nomina->deductions()->attach(
                                            $deduction->id , ['monto' => $request->infonavit]
                                        );
                                        break;
                                }
                            case 8:
                                if($request->enlace == null)
                                {
                                    break;
                                }else{
                                    
                                        $nomina->deductions()->attach(
                                            $deduction->id , ['monto' => $request->enlace]
                                        );
                                        break;
                                }
                            /*case 11: Pension alimenticia
                                if($request->enlace == null)
                                {
                                    break;
                                }else{
                                    
                                        $nomina->deductions()->attach(
                                            $deduction->deduction_id , ['monto' => $request->enlace]
                                        );
                                }
                                break;*/
                            case 14://ISR
                                    $isr = $this->isrsin($request,'isr');
                                    $nomina->deductions()->attach(
                                        $deduction->id , ['monto' => $isr]
                                    );
                                break;
                            default:
                                # code...
                                break;
                        }
                            
                    }
                    $payde = Paydetail::orderBy('id','desc')->first();
                    $cuentaper = Paydetail::join('paydetail_perception as nom','nom.paydetail_id','=','paydetails.id')
                    ->join('perceptions as p','p.id','=','nom.perception_id')
                    ->where('nom.paydetail_id',$payde->id)
                    ->where('paydetails.contract_id',$request->contract_id)
                    ->sum('nom.monto');

                    $cuentaded = Paydetail::join('deduction_paydetail as nom','nom.paydetail_id','=','paydetails.id')
                    ->join('deductions as p','p.id','=','nom.deduction_id')
                    ->where('nom.paydetail_id',$payde->id)
                    ->where('paydetails.contract_id',$request->contract_id)
                    ->sum('nom.monto');
                    
                    $nomina->percepcion = $cuentaper;
                    $nomina->per_gravable = $request->compensacion;
                    $nomina->deduccion = $cuentaded;
                    $nomina->monto_total = $cuentaper - $cuentaded;
                    $nomina->save();
        }
        public function normal_confianza(Request $request)
        {
            //verificar ISR IMSS
            $nomina = new Paydetail();
            $nomina->contract_id = $request->contract_id;
            $nomina->payroll_id = $request->payroll_id;
            $nomina->save();
            $tp = Contract::where('id',$request->contract_id)->first(); //contrato
            
            $perceptions = Perception::all();
            $deductions = Deduction::all();
                    
            $pg = Tab::join('tabdetails as td','td.tab_id','=','tabs.id')
                ->where('tabs.status',1)
                ->where('tabs.sindicalizado',$tp->sindicalizado)
                ->where('td.position_id',$tp->position_id)
                ->first();
            $quin = $pg->sueldo_diario * 15;
            $men = $pg->sueldo_mensual;
            $date = Carbon::now('America/Mexico_City');
            $date = $date->format('m-d');

                    foreach($perceptions as $perception)
                    {
                        
                        switch ($perception->id) {
                            case 1:
                                if($request->compensacion == null){
                                    break;
                                }
                                else
                                {
                                    $nomina->perceptions()->attach(
                                        $perception->id , ['monto' => $request->compensacion]
                                    );
                                    break;
                                }
                            case 2:
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $quin]
                                );
                                break;
                            /*case 3:
                                $buscarpor = 'FOMENTO Deportivo';
                                $fomdep = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $fomdep->valor]
                                );
                                break;
                            case 4:
                                $buscarpor = 'FOMENTO cultural';
                                $fomcul = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $fomcul->valor]
                                );
                                break;*/
                            case 6://extra
                                if(($date >= '05-01') and ($date <= '05-15'))
                                    {
                                        $buscarpor = 'mayo';
                                        $mayo = Setting::where('nombre','like','%'.$buscarpor.'%')
                                        ->where('status',1)->first();
                                        $nomina->perceptions()->attach(
                                            $perception->id , ['monto' => $mayo->valor]
                                        );
                                        break;
                                        
                                    }else{
                                        break;
                                    }
                                
                            //case 10:
                                //$horasextra;
                                //break;
                            case 11:
                                $buscarpor = 'productividad';
                                $prod = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $pro = $quin * $prod->valor;
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $pro]
                                );
                                break;
                            case 13://extra
                                if(($date >= '07-15') and ($date <= '07-30'))
                                {
                                    $buscarpor = 'burocrata';
                                    $buro = Setting::where('nombre','like','%'.$buscarpor.'%')
                                    ->where('status',1)->first();
                                    $nomina->perceptions()->attach(
                                        $perception->id , ['monto' => $buro->valor]
                                    );
                                break;
                                }
                                else{
                                    break;
                                }
                            /*case 18:// extraor
                                $buscarpor = 'escolares';
                                $esc = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $esc->valor]
                                );
                                break;*/
                            case 19:
                                $buscarpor = 'prevision social';
                                $prv = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $prv->valor]
                                );
                                break;
                            case 25:
                                $subcon = $this->isrcon($request,'sub');
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $subcon]
                                );
                                break;
                            /*case :
                                
                                break;
                            case :
                                
                                break;
                            case :
                                
                                break;
                            case :
                                
                                break;*/
                            default:
                                /*$nomina->perceptions()->attach(
                                    $perception->id , ['monto' => 2]
                                );*/
                                break;
                        }   
                    }
                    foreach($deductions as $deduction)
                    {
                        switch ($deduction->id) {
                            /*case 1://cuota sindical
                                $buscarpor = 'cuota sindical';
                                $cuota = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $pago = $quin * $cuota->valor;
                                $nomina->deductions()->attach(
                                $deduction->id , ['monto' => $pago]
                            );
                                break;*/
                            case 2: //faltas
                                if($request->faltas == null)
                                {
                                    break;
                                }
                                else
                                {
                                    $buscarpor = 'prevision social';
                                    $prv = Setting::where('nombre','like','%'.$buscarpor.'%')
                                    ->where('status',1)->first();
                                    $comp = $request->compensacion;
                                    $falta = (($men + $comp + $prv->monto)/30)* $request->faltas;
                                    $nomina->deductions()->attach(
                                        $deduction->id , ['monto' => $falta]
                                    );
                                }
                                break;
                            /*case 4:
                                $buscarpor = 'desplazamiento';
                                $des = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $cuo = $quin * $des->valor;
                                $nomina->deductions()->attach(
                                    $deduction->id , ['monto' => $cuo]
                                );
                                break;*/
                            case 5:
                                $buscarpor = 'fondo de ahorro';
                                $fon = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $fondo = $quin * $fon->valor;
                                $nomina->deductions()->attach(
                                    $deduction->id , ['monto' => $fondo]
                                );
                                break;    
                            case 6:
                                if($request->infonacot == null)
                                {
                                    break;
                                }else{
                                        $nomina->deductions()->attach(
                                            $deduction->id , ['monto' => $request->infonacot]
                                        );
                                        break;
                                }
                                
                            case 7:
                                if($request->infonavit == null)
                                {
                                    break;
                                }else{
                                        $nomina->deductions()->attach(
                                            $deduction->id , ['monto' => $request->infonavit]
                                        );
                                        break;
                                }
                            case 8:
                                if($request->enlace == null)
                                {
                                    break;
                                }else{
                                    
                                        $nomina->deductions()->attach(
                                            $deduction->id , ['monto' => $request->enlace]
                                        );
                                        break;
                                }
                            /*case 11: Pension alimenticia
                                if($request->enlace == null)
                                {
                                    break;
                                }else{
                                    
                                        $nomina->deductions()->attach(
                                            $deduction->deduction_id , ['monto' => $request->enlace]
                                        );
                                }
                                break;*/
                            case 14://ISR
                                    $isr = $this->isrcon($request,'isr');
                                    $nomina->deductions()->attach(
                                        $deduction->id , ['monto' => $isr]
                                    );
                                break;
                            case 15:
                                $imss = $this->imss_con($request);
                                $nomina->deductions()->attach(
                                    $deduction->id , ['monto' => $imss]
                                );
                                break;
                            default:
                                # code...
                                break;
                        }
                            
                    }
                    $payde = Paydetail::orderBy('id','desc')->first();
                    $cuentaper = Paydetail::join('paydetail_perception as nom','nom.paydetail_id','=','paydetails.id')
                    ->join('perceptions as p','p.id','=','nom.perception_id')
                    ->where('nom.paydetail_id',$payde->id)
                    ->where('paydetails.contract_id',$request->contract_id)
                    ->sum('nom.monto');

                    $cuentaded = Paydetail::join('deduction_paydetail as nom','nom.paydetail_id','=','paydetails.id')
                    ->join('deductions as p','p.id','=','nom.deduction_id')
                    ->where('nom.paydetail_id',$payde->id)
                    ->where('paydetails.contract_id',$request->contract_id)
                    ->sum('nom.monto');
                    
                    $nomina->percepcion = $cuentaper;
                    $nomina->per_gravable = $request->compensacion;
                    $nomina->deduccion = $cuentaded;
                    $nomina->monto_total = $cuentaper - $cuentaded;
                    $nomina->save();
        }
    #endnominanormal
    #ISR
        public function isrsin(Request $request, String $string)
        {
                $tp = Contract::where('id',$request->contract_id)->first(); //contrato
                $pg = Tab::join('tabdetails as td','td.tab_id','=','tabs.id')
                ->where('tabs.status',1)
                ->where('tabs.sindicalizado',$tp->sindicalizado)                            
                ->where('td.position_id',$tp->position_id)
                ->first();
                $sueldo = $pg->sueldo_diario * 15; //sueldo
                
                $complem = $request->compensacion; //complemento sueldo
                
                $buscarpor = 'FOMENTO cultural';                                 //fomento cultural
                    $fomcul = Setting::where('nombre','like','%'.$buscarpor.'%') //fomento cultural
                    ->where('status',1)->first();                                //fomento cultural
                $fcul = $fomcul->valor; //fomento cultural
                
                $buscarpor = 'productividad';
                                $prod = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();
                                $pro = $sueldo * $prod->valor;//productividad
                $su_sa = $sueldo + $complem + $fcul + $pro; //sueldos y salarios
                
                $base = $sueldo + $pro;//base gravada

                $isr = Isr::join('isrdetails as i','i.isr_id','=','isr.id')
                ->where('isr.status',1)
                ->where('i.lim_inf','<=',$base)
                ->where('i.lim_sup','>=',$base)->first();
                
                $subsidio = Subsidy::join('subdetails as sub','sub.subsidy_id','=','subsidies.id')
                ->where('subsidies.status',1)
                ->where('desde','<=',$base)
                ->where('hasta','>=',$base)->first();

                $liminf = $isr->lim_inf; //limite inferior
                $excliminf = $base - $liminf; //excedente limite inferior
                $tasa = $isr->excedente; //tasa de interes
                $impmar = $tasa * $excliminf; //imp marginal
                $cuofija = $isr->cuota;  //cuota fija
                $imp113 = $impmar + $cuofija; //imp 113
                $sub = $subsidio->cantidad; // subsidio
                $subimp = $imp113 - $sub; //imp o subsidio
                $impquin = $subimp/2; // imp o subsidio quincenal

                if($string == 'isr')
                {
                    return $impquin;
                }elseif($string == 'sub')
                {
                    return $sub;
                }
                
        }
        public function isrcon(Request $request, String $string)
        {
            $tp = Contract::where('id',$request->contract_id)->first(); //contrato
            $pg = Tab::join('tabdetails as td','td.tab_id','=','tabs.id')
            ->where('tabs.status',1)
            ->where('tabs.sindicalizado',$tp->sindicalizado)
            ->where('td.position_id',$tp->position_id)
            ->first();
            
            $complemento = 2100;

            $sueldo = $pg->sueldo_diario * 15; //sueldo
            
            $compensacion = $request->compensacion; //Compensacion

            $buscarpor = 'prevision social';
            $prod = Setting::where('nombre','like','%'.$buscarpor.'%')
            ->where('status',1)->first();
            
            $social = $prod->valor; //4.1 prev social

            $sueldos_salarios = $sueldo + $compensacion + $social + $complemento;

            $base = $sueldo + $compensacion;//base gravada

                $isr = Isr::join('isrdetails as i','i.isr_id','=','isr.id')
                ->where('isr.status',1)
                ->where('i.lim_inf','<=',$base)
                ->where('i.lim_sup','>=',$base)->first();
                
                $subsidio = Subsidy::join('subdetails as sub','sub.subsidy_id','=','subsidies.id')
                ->where('subsidies.status',1)
                ->where('desde','<=',$base)
                ->where('hasta','>=',$base)->first();

                $liminf = $isr->lim_inf; //limite inferior
                $excliminf = $base - $liminf; //excedente limite inferior
                $tasa = $isr->excedente; //tasa de interes
                $impmar = $tasa * $excliminf; //imp marginal
                $cuofija = $isr->cuota;  //cuota fija
                $imp113 = $impmar + $cuofija; //imp 113
                $sub = $subsidio->cantidad; // subsidio
                $impquin = $imp113 - $sub; //imp o subsidio
                //$impquin = $subimp - $imp113; // imp o subsidio quincenal

                //return $subimp;
                if($string == 'isr')
                {
                    return $impquin;
                }elseif($string == 'sub')
                {
                    return $sub;
                }
        }
    #endcalculoISR
    #calculoIMSS
        public function imss_con(Request $request)
        {
            $buscarpor = 'uma';
            $prv = Setting::where('nombre','like','%'.$buscarpor.'%')
            ->where('status',1)->first();
            $uma = $prv->valor;
            $tp = Contract::where('id',$request->contract_id)->first(); //contrato
            $trabajador = $tp->worker_id;
            $fecha = Worker::where('id',$trabajador)->first();

            $pg = Tab::join('tabdetails as td','td.tab_id','=','tabs.id')
            ->where('tabs.status',1)                
            ->where('tabs.sindicalizado',$tp->sindicalizado)
            ->where('td.position_id',$tp->position_id)
            ->first();
            $sueldo = $pg->sueldo_diario * 15; //Sueldo
            $compen = $request->compensacion; //Compensacion
            $comp_sueldo = 10060.50; //Complemento sueldo $pg->compensacion
            
            $buscarpor = 'prevision social';
            $prod = Setting::where('nombre','like','%'.$buscarpor.'%')
            ->where('status',1)->first();

            $su_sa = $prod->valor; //Sueldos y salarios
            $fecha_alta = $fecha->created_at; //fecha de alta
            $actual = Carbon::now('America/Mexico_City'); //fecha actual
            $dias = Days360::between($fecha_alta,$actual,false);
            $anosprima = $dias/360;
            if($anosprima < 1)
            {
                $diascalculo = 0;
            }elseif($anosprima >= 5)
            {
                $diascalculo = 13;
            }else{
                $diascalculo = 10;
            }
            #SDI
                $s1 = $sueldo + $compen;
                $s2 = $sueldo * 0.3 *(20/365);
                $s3 = $s1 * (60/365);
                $c1 = $s1 + $s2 + $s3;
                $umas = (25 * $uma) * 30;
                if($c1 < $umas)
                {
                    $sdi = $c1/30;
                }else
                {
                    $sdi = $umas/30;
                }
            #endSDI
            $cuota_fija = 30 * $uma * 0.204;
            
            $buscarpor = 'riesgo de trabajo';
            $prv = Setting::where('nombre','like','%'.$buscarpor.'%')
            ->where('status',1)->first();
            $r_t = $prv->valor;

            $riesgo = $sdi * 30 * $r_t;
            $con = ($sdi - (3* $uma)) * 0.011;
            if( $con < 0 )
            {
                $cuota_pat = 0;
            }else{
                $cuota_pat = $con * 30;
            }

            $cond = ($sdi - (3* $uma)) * 0.004;

            if( $cond < 0 )
            {
                $cuota_trab = 0;
            }else{
                $cuota_trab = $cond * 30;
            }

            $cuota_imss = $cuota_trab / 2;

            //return [$sdi,$cuota_fija,$riesgo,$cuota_pat,$cuota_trab,$cuota_imss];
            return $cuota_imss;
        }
    #endcalculoIMSS
    #aguinaldo
        public function aguinaldo()
        {
            
            $contratos = Contract::where('status',1)->get(); //contrato
            $tab = DB::table('payrolls')->orderByDesc('id')->first();
            //return $contratos;
            $perceptions = Perception::all();
            foreach($contratos as $contrato)
            {
                $nomina = new Paydetail();
                $nomina->contract_id = $contrato->id;
                $nomina->payroll_id = $tab->id;
                $nomina->save();
                $tp = Contract::where('id',$contrato->id)->first(); //contrato
            
                $pg = Tab::join('tabdetails as td','td.tab_id','=','tabs.id')
                ->where('tabs.status',1)
                ->where('tabs.sindicalizado',$tp->sindicalizado)
                ->where('td.position_id',$tp->position_id)
                ->first();

                foreach($perceptions as $perception)
                {
                    $ctto = Contract::where('id',$contrato->id)->first();
                    $tipo = $ctto->sindicalizado;
                    switch ($perception->id) {
                        case 33:
                            if($tipo == 1)
                            {
                                $buscarpor = 'aguinaldo confianza';
                                $sindi = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();

                                $agui = $pg->sueldo_mensual * $sindi->valor;
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $agui]
                                );
                                break;
                            }elseif($tipo == 0)
                            {
                                $buscarpor = 'aguinaldo confianza';
                                $sindi = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();

                                $buscarpor = 'prevision social';
                                $prevision = Setting::where('nombre','like','%'.$buscarpor.'%')
                                ->where('status',1)->first();

                                $agui = ($pg->sueldo_mensual + $prevision->valor) * $sindi->valor;
                                $nomina->perceptions()->attach(
                                    $perception->id , ['monto' => $agui]
                                );
                                break;
                            }
                            
                            
                        default:
                            break;
                        }
                }
                $payde = Paydetail::orderBy('id','desc')->first();
                $cuentaper = Paydetail::join('paydetail_perception as nom','nom.paydetail_id','=','paydetails.id')
                ->join('perceptions as p','p.id','=','nom.perception_id')
                ->where('nom.paydetail_id',$payde->id)
                ->where('paydetails.contract_id',$contrato->id)
                ->sum('nom.monto');
                
                $nomina->percepcion = $cuentaper;
                $nomina->per_gravable = 0;
                $nomina->deduccion = 0;
                $nomina->monto_total = $cuentaper;
                $nomina->save();
            }
        }
    #endaguinaldo
}

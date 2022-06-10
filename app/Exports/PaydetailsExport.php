<?php

namespace App\Exports;

use App\Models\Paydetail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PaydetailsExport implements FromView, ShouldAutoSize
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
 }
    use Exportable;
    public function view(): View
    {
        return view('paydetail.exportable',[
            'paydetails'    => Paydetail::where('payroll_id',$this->id)->get(),
            'perceptions'   => DB::table('perceptions')->get(),
            'deductions'    => DB::table('deductions')->get(),
        ]);
    }
}


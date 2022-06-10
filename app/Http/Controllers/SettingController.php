<?php

namespace App\Http\Controllers;

use App\Imports\SettingsImport;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SettingController extends Controller
{
    public function index()
    {
        $settings = DB::table('settings')->Simplepaginate(10);
        return view('setting.index',compact('settings'));
    }

    public function create()
    {
        $setting = new Setting();
        return view('setting.create',compact('setting'));
    }

    public function store(Request $request)
    {
        $comp1 = $request->nombre;
        $comp = Setting::where('nombre','like','%'.$comp1.'%')
        ->where('status',1)->first();
        if($comp == null)
        {
            Setting::create($request->all());
            return redirect()->route('setting.index')
                ->with('success', 'Creado satisfactoriamente.');
        }elseif($comp->nombre == $comp1)
        {
            return redirect()->route('setting.index')
            ->with('success', 'Verificar que anterior datto este inactivo');
        }else{
            return redirect()->route('setting.index')
            ->with('success', 'Verificar que anterior datto este inactivo');
        }
        
    }

    public function show($id)
    {
        $setting = Setting::find($id);
        return view('setting.show',compact('setting'));
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('setting.edit',compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect()->route('setting.index')
            ->with('success', 'Actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Setting::find($id)->delete();
        return redirect()->route('setting.index')
            ->with('success', 'Eliminado satisfactoriamente');
    }
    public function import()
    {
        return view('setting.import-excel');
    }

    public function saveimport(Request $request)
    {
        
        $file = $request->file('import');
        Excel::import(new SettingsImport, $file);
        return redirect()->route('setting.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

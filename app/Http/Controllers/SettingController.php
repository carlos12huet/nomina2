<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $settings = DB::table('settings')->Simplepaginate(5);
        return view('setting.index',compact('settings'));
    }

    public function create()
    {
        $setting = new Setting();
        return view('setting.create',compact('setting'));
    }

    public function store(Request $request)
    {
        Setting::create($request->all());
        return redirect()->route('setting.index')
            ->with('success', 'Regimen Fiscal creado satisfactoriamente.');
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
            ->with('success', 'Regimen fiscal actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Setting::find($id)->delete();
        return redirect()->route('setting.index')
            ->with('success', 'Regimen fiscal eliminado satisfactoriamente');
    }
}

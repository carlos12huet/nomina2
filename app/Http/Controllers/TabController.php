<?php

namespace App\Http\Controllers;

use App\Http\Requests\TabRequest;
use App\Models\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TabController extends Controller
{
    public function index()
    {
        $tabs = DB::table('tabs')->Simplepaginate(10);
        return view('tab.index',compact('tabs'));
    }

    public function create()
    {
        $tab = new Tab();
        return view('tab.create',compact('tab'));
    }

    public function store(TabRequest $request)
    {
        Tab::create($request->all());
        return redirect()->route('tabdetail.create')
            ->with('success', 'Tabulador creado satisfactoriamente.');
    }

    public function show($id)
    {
        $tab = Tab::find($id);
        return view('tab.show',compact('tab'));
    }

    public function edit($id)
    {
        $tab = Tab::find($id);
        return view('tab.edit',compact('tab'));
    }

    public function update(TabRequest $request, Tab $tab)
    {
        $tab->update($request->all());
        return redirect()->route('tab.index')
            ->with('success', 'Tabulador actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Tab::find($id)->delete();
        return redirect()->route('tab.index')
            ->with('success', 'Tabulador eliminado satisfactoriamente');
    }
}

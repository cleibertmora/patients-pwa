<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedimiento;
use Auth; 

class ProcedimientoController extends Controller
{
    public function index(Request $request){
        $search = $request->searchProcedimientoInput;
        $procedimientos = Procedimiento::search($search)->orderBy('created_at', 'DESC')->simplePaginate(10);

        return view('modules.procedimientos.index', compact('procedimientos'));
    }
    
    public function create(Request $request){
        if($request->has('pat'))
            $idpaciente = $request->get('pat');
        else
            $idpaciente = false;

        return view('modules.procedimientos.create', compact('idpaciente'));
    }

    public function store(Request $request){
        $form      = $request->all();
        $clinic_id = Auth::user()->clinic_id;
        $form['clinica_id'] = $clinic_id;

        $procedimiento = Procedimiento::create($form);

        return redirect()->back();
    }

    public function edit($id){
        $procedimiento = Procedimiento::find($id);

        return view('modules.procedimientos.edit', compact('procedimiento'));
    }

    public function update(Request $request, $id){
        $form      = $request->all();
        $clinic_id = Auth::user()->clinic_id;
        $form['clinica_id'] = $clinic_id;

        $procedimiento = Procedimiento::find($id);

        $procedimiento->fill($form)->save();

        return redirect()->route('procedimientos.index');
    }
}

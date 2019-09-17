<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnostic;
use App\Procedimiento;

class DiagnosticController extends Controller
{
    public function index($id){
        $procedimientos = Procedimiento::orderBy('id')->pluck('procedimiento', 'id');
        $paciente = $id;
        
        $diagnosticos = Diagnostic::where('paciente_id', '=' ,$id)->get();


        //dd($var);

        return view('modules.diagnostics.index', compact('procedimientos', 'paciente', 'diagnosticos'));
    }

    public function insert(Request $request){
        $diagnostico = Diagnostic::create($request->all());

        return redirect()->back();
    }
}

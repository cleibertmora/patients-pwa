<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnostic;
use App\Procedimiento;
use App\Patient;
use Carbon\Carbon;
use DateTime;
use Jenssegers\Date\Date;

class DiagnosticController extends Controller
{
    public function index($id){
        $procedimientos = Procedimiento::orderBy('id')->pluck('procedimiento', 'id');
        $paciente = $id;
        $patient  = Patient::find($id);
        
        $diagnosticos = Diagnostic::where('paciente_id', '=' ,$id)->get();

        $hoy = Date::now()->format('Y-m-d');
        $consultas = array();

        foreach($patient->consultas as $consulta){
            if($consulta['fecha'] === $hoy && $consulta['status'] != 'Finalizada'){
                $timeIn = Date::parse($consulta->horaIn)->format('g:i A');
                $timeFin = Date::parse($consulta->horaFin)->format('g:i A');

                $consulta->horaIn = $timeIn;
                $consulta->horaFin = $timeFin;

                $consultas[] = $consulta;
            }
        }

        return view('modules.diagnostics.index', compact('procedimientos', 'paciente', 'diagnosticos', 'consultas'));
    }

    public function insert(Request $request){
        $diagnostico = Diagnostic::create($request->all());

        return redirect()->back();
    }

    public function undoTratamiento($id){
        //$diagnostic = Diagnostic::find($id);

        dd('hola'. $id);
    }
}

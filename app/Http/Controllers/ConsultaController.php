<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User;
use App\Consulta;
use App\Diagnostic;
use Carbon\Carbon;
use DateTime;
use Jenssegers\Date\Date;
Date::setLocale('es');

class ConsultaController extends Controller
{
    public function index(Request $request){
        
        if($request->fecha)
            $fecha = $request->fecha;
        else
            $fecha = Date::now()->format('Y-m-d');
        
        $consultas = Consulta::where('fecha', '=', $fecha)->orderBy('horaIn', 'ASC')->get();

        $time;

        foreach($consultas as $consulta){
            $timeIn = Date::parse($consulta->horaIn)->format('g:i A');
            $timeFin = Date::parse($consulta->horaFin)->format('g:i A');

            $consulta->horaIn = $timeIn;
            $consulta->horaFin = $timeFin;
        }

        $fecha = Date::parse($fecha);

        $queryFecha = $fecha->format('l j F, Y');

        return view('modules.consultas.index', compact('consultas', 'queryFecha'));
    }

    public function create(Request $request){
        $patient = Patient::find($request->id);
        $doctors = User::where('clinic_id', '=', $patient->clinic_id)
                        ->where('level', '=', 'doctor')
                        ->pluck('nombre', 'id');

        return view('modules.consultas.create', compact('patient', 'doctors'));
    }

    public function store(Request $request){
        $consulta = Consulta::create($request->all());
        
        return redirect()->route('listado', '');
    }

    public function edit(Request $request, $id){
        $consulta = Consulta::find($id);

        $patient = Patient::find($request->id);
        $doctors = User::where('clinic_id', '=', $patient->clinic_id)
                        ->where('level', '=', 'doctor')
                        ->pluck('nombre', 'id');
        return view('modules.consultas.edit', compact('consulta' ,'patient', 'doctors'));
    }

    public function update(Request $request, $id){
        $consulta    = Consulta::find($id);
        $consulta->fill($request->all())->save();
        
        return redirect()->route('listado', 'fecha='.$consulta->fecha);
    }

    public function show($id){
        $consulta = Consulta::find($id);
        $paciente = Patient::find($consulta->paciente_id);
        $diagnosticos = Diagnostic::where('paciente_id', '=', $consulta->paciente_id)->where('estado', '=', 'pendiente')->orderBy('created_at', 'DESC')->get();

        return view('modules.consultas.show', compact('consulta', 'paciente', 'diagnosticos'));
    }

    public function evolucion(Request $request){
        $tratamientos = $request->diagnostico;
        $idconsulta   = $request->id;

        foreach($tratamientos as $tratamiento => $val){
            $diagnostico = Diagnostic::find($val);
            $diagnostico->estado = 'realizado';
            $diagnostico->consulta_id_realizado = $idconsulta;
            $diagnostico->save();
        }

        $consulta = Consulta::find($idconsulta);
        $consulta->evolucion = $request->evolucion;
        $consulta->status = 'Finalizada';
        $consulta->save();
        
        return redirect()->route('pacientes.show', $request->idpaciente);
    }
}

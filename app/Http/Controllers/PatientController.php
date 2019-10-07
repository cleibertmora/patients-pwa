<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\Patient;
use Carbon\Carbon;
use DateTime;
use Jenssegers\Date\Date;

class PatientController extends Controller
{
    public function index(Request $request){
        $search = $request->searchPacienteInput;
        $patients = Patient::search($search)->orderBy('created_at', 'DESC')->simplePaginate(5);
        
        return view('modules.patients.index')->with('patients', $patients);
    }

    public function create(){
        return view('modules.patients.create');
    }

    public function store(Request $request){
        $patient = $request->all();
        $user = auth()->user();
        $patient['clinic_id'] = $user->clinic_id;

        $newPatient = Patient::create($patient);

        return redirect()->route('pacientes.index');
    }

    public function show($id){
        $patient   = Patient::find($id);
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

        return view('modules.patients.show', compact('patient', 'consultas'));
    }

    public function edit($id){
        $patient = Patient::find($id);

        return view('modules.patients.edit')->with('patient', $patient);    
    }

    public function update(Request $request, $id){
        $patient = Patient::find($id);
        
        $patient->fill($request->all())->save();
        return redirect()->route('pacientes.show', $id);
    }
}
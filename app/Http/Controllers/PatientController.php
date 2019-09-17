<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\Patient;

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
        $patient = Patient::find($id);

        return view('modules.patients.show')->with('patient', $patient);
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
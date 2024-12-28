<?php

namespace App\Http\Controllers;
use App\Model\Patient;
use Illuminate\Http\Request;


class PatientController extends Controller
{


    public function index()
    {
        $Patient = Patient::paginate(3); 
        return view('patient', [
            "result" => $Patient,
        ]);
    }


    public function show($id)
    {
        $Patient = Patient::findOrFail($id);
        return view('Patient/show', ["result" => $Patient]);
    }

    public function delete($id)
    {
        $Patient = Patient::findOrFail($id);
        $Patient->delete();
        return redirect()->route('patient')->with("message", "deleted successfully");
    }

    public function create()
    {
        return view('patient/create');
    }

    public function savenew(Request $item)
    {
        $item->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'medicalhistory' => 'required',
        ]);
        Patient::create([
            "name" => $item->name,
            "email" => $item->email,
            "gender" => $item->gender,
            "address" => $item->address,
            "phone" => $item->phone,
            "age" => $item->age,
            "medicalhistory" => $item->medicalhistory,
        ]);

        return redirect()->route('patient')->with("message", "Created Successfully");
    }

    public function edit($id)
    {
        $Patient = Patient::findOrFail($id);
        return view("patient/edit", ["result" => $Patient]);
    }

    public function saveedit(Request $request)
    {
        $old_id = $request->old_id;
        $Patient = Patient::findOrFail($old_id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'medicalhistory' => 'required',
        ]);
        $Patient->update([
            "name" => $request->name,
            "email" => $request->email,
            "gender" => $request->gender,
            "address" => $request->address,
            "phone" => $request->phone,
            "age" => $request->age,
            "medicalhistory" => $request->medicalhistory,
        ]);
        return redirect()->route("patient")->with("message", "edited successfully");
    }

    public function search (Request $request)
    {
        $search = $request->get('search');
        $patients = Patient::when($search, function($sql) use ($search) {
                $sql->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(5);
    
        return view('Patientsearch',  [
            "data" => $patients,
        ]);
    }



}

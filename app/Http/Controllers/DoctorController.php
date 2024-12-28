<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\Model\Patientbooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{

    public function getData(){
        $Doctor = Doctor::paginate(3); 
        return view('doctor', [
            "data" => $Doctor,
        ]);
    }

    public function show($id)
    {
        $Doctor = Doctor::findOrFail($id);
        return view('Doctor/show', ["result" => $Doctor]);
    }

    public function delete($id)
    {
        $Doctor = Doctor::findOrFail($id);
        $Doctor->delete();
        return redirect()->route('doctor')->with("message", "deleted successfully");
    }

    public function create()
    {
        return view('Doctor/create');
    }

    public function savenew(Request $item)
    {
        $item->validate([
            'name' => 'required',
            'email' => 'required|unique:doctors',
            'password' => 'required',
            'doc_image' => 'required|max:2048|mimes:png,jpeg',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'age' => 'required',
            'days' => 'required',
            'time' => 'required',
            'Consultancyfees' => 'required',
        ]);
        if ($item->hasFile("doc_image")) {
            $image = $item->doc_image;
            $imageName = time() . rand(1, 100) . "." . $image->extension();
            $image->move(public_path("img/doctors/"), $imageName);
        }

        $patibook = Patientbooking::count();

        Doctor::create([
            "name" => $item->name,
            "email" => $item->email,
            'password' => Hash::make($item['password']),
            "doc_image" => $imageName,
            "gender" => $item->gender,
            "address" => $item->address,
            "phone" => $item->phone,
            "department" => $item->department,
            "age" => $item->age,
            "days" => $item->days,
            "time" => $item->time,
            "Consultancyfees" => $item->Consultancyfees,
        ]);

        return redirect()->route('doctor')->with("message", "Created Successfully");
    }

    public function edit($id)
    {
        $Doctor = Doctor::findOrFail($id);
        return view("Doctor/edit", ["result" => $Doctor]);
    }

    public function saveedit(Request $request)
    {
        $old_id = $request->old_id;
        $Doctor = Doctor::findOrFail($old_id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:doctors',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'age' => 'required',
            'days' => 'required',
            'time' => 'required',
            'Consultancyfees' => 'required',
        ]);

        if ($request->hasFile("doc_image")) {
            $image = $request->doc_image;
            $imageName = time() . rand(1, 100) . "." . $image->extension();
            $image->move(public_path("img/doctors/"), $imageName);
        } else {
            $imageName = $Doctor->doc_image;
        }
        
        $patibook = Patientbooking::count();

        $Doctor->update([
            "name" => $request->name,
            "email" => $request->email,
            'password' => Hash::make($request['password']),
            "doc_image" => $imageName,
            "gender" => $request->gender,
            "address" => $request->address,
            "phone" => $request->phone,
            "department" => $request->department,
            "age" => $request->age,
            "days" => $request->days,
            "time" => $request->time,
            "Consultancyfees" => $request->Consultancyfees,
        ]);
        return redirect()->route("doctor")->with("message", "edited successfully");
    }

    public function search (Request $request)
    {
        $search = $request->get('search');
        $doctors = Doctor::when($search, function($sql) use ($search) {
                $sql->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(5);
    
        return view('doctorsearch',  [
            "element" => $doctors,
        ]);
    }
    
    public function showlist()
    {
        $Doctor = Doctor::paginate(3); 
        return view('doctorlist', [
            "element" => $Doctor,
        ]);
    }

    public function searchlist (Request $request)
    {
        $search = $request->get('search');
        $doctors = Doctor::when($search, function($sql) use ($search) {
                $sql->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(3);
    
        return view('listsearch',  [
            "data" => $doctors,
        ]);
    }

}


 

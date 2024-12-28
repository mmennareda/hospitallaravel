<?php

namespace App\Http\Controllers;

use App\Model\Department;
use App\Model\Doctor;
use App\Model\Patientbooking;
use App\Model\Patient;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $patibook = Patientbooking::count();
        $doctors = Doctor::count();
        $department = Department::count();
        $patients = Patient::count();

        return view('home', [
            "countpatibook" => $patibook,
            "countdoctors" => $doctors,
            "countdepart" => $department,
            "countpatients" => $patients,
        ]);
    }


    public function searchapp(Request $request)
    {
        $search = $request->get('search');
        $users = Patientbooking::when($search, function ($sql) use ($search) {
            $sql->where('doctoremail', 'like', '%' . $search . '%');
        })
            ->paginate(4);

        return view('searchapp',  [
            "data" => $users,
        ]);
    }

    public function show()
    {
        $user = User::paginate(5);
        return view('user', [
            "result" => $user,
        ]);
    }

    public function delete($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->route('user')->with("message", "deleted successfully");
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::when($search, function ($sql) use ($search) {
            $sql->where('name', 'like', '%' . $search . '%');
        })
            ->paginate(5);

        return view('usersearch',  [
            "data" => $users,
        ]);
    }
}

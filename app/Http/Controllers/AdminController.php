<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{


    public function index()
    {
        $admin = Admin::paginate(3); 
        return view('admin', [
            "result" => $admin,
        ]);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin/show', ["result" => $admin]);
    }

    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin')->with("message", "deleted successfully");
    }

    public function create()
    {
        return view('admin/create');
    }

    public function savenew(Request $item)
    {
        $item->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
       
        Admin::create([
            "name" => $item->name,
            "email" => $item->email,
            'password' => Hash::make($item['password']),
            "gender" => $item->gender,
            "address" => $item->address,
            "phone" => $item->phone,

        ]);

        return redirect()->route('admin')->with("message", "Created Successfully");
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view("admin/edit", ["result" => $admin]);
    }

    public function saveedit(Request $request)
    {
        $old_id = $request->old_id;
        $admin = Admin::findOrFail($old_id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $admin->update([
            "name" => $request->name,
            "email" => $request->email,
            'password' => Hash::make($request['password']),
            "address" => $request->address,
            "phone" => $request->phone,
        ]);
        return redirect()->route("admin")->with("message", "edited successfully");
    }
}

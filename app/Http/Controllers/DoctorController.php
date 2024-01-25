<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function index() {
        $doctors = Doctor::all();
        $departments = Department::all();
    	return view('admin.doctor.view', compact('doctors', 'departments'));
    }

    public function store(Request $request) {

        request()->validate([
            'department_id' => 'required',
            'name'=> 'required|string',
            'email'=> 'required|string',
            'phone'=> 'required',
            'speciality' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'status' => 'required|in:active,inactive',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $docUser = new User();
        $docUser->name = request('name');
        $docUser->email = request('email');
        $docUser->phone = request('phone');
        $docUser->password = Hash::make(request('password'));

        $docUser->save();

        $doctor = new Doctor();
        $doctor->user_id = $docUser->id;
        $doctor->department_id = request('department_id');
        $doctor->name = request('name');
        $doctor->email = request('email');
        $doctor->phone = request('phone');
        $doctor->speciality = request('speciality');
        $doctor->gender = request('gender');


        if (request('photo')) {
            $doctor->photo = request('photo')->store('images');
        }
        $doctor->save();
        $docUser->roles()->attach(Role::find(2));
        session()->flash('doctor-create-message', 'Doctor created successfully.....');
        return back()->withErrors(['Error' => 'An error occurred while creating the doctor.']);
    }

    public function update(Doctor $doctor) {

        $inputs = request()->validate([
            'department_id' => 'required',
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'speciality' => 'required',
            'gender' => 'required',
            'photo' => 'file',
            'status' => 'required'

        ]);
        $inputs['status'] = $inputs['status'] ?? $doctor->status;
        $doctor->name = $inputs['name'];
        $doctor->email = $inputs['email'];
        $doctor->phone = $inputs['phone'];
        $doctor->speciality = $inputs['speciality'];
        $doctor->gender = $inputs['gender'];
        $doctor->status = $inputs['status'];

        if (request()->hasFile('photo')) {
            $inputs['photo'] = request('photo')->store('images');
            $doctor->photo = $inputs['photo'];
        }

        $doctor->update();
        session()->flash('doctor-update-message', 'Doctor updated successfully.....');
        return redirect()->route('doctor.view');
    }

    public function delete(Doctor $doctor) {
        $doctor->delete();
        session()->flash('doctor-delete-message', 'Doctor deleted successfully.....');
        return back();
    }

}
?>

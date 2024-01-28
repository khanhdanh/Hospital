<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{

    public function index() {
        $staffMembers = Staff::all();
        $departments = Department::all();
    	return view('admin.staff.view', compact('staffMembers', 'departments'));
    }

    public function store(Request $request) {

        request()->validate([
            'name'=> 'required|string',
            'gender' => 'required|in:male,female,other',
            'email'=> 'required|email|string',
            'phone'=> 'required',
            'dob' => 'required|date_format:D-m-y',
            'description' => 'nullable',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $staffUser = new User();
        $staffUser->name = request('name');
        $staffUser->gender = request('gender');
        $staffUser->email = request('email');
        $staffUser->phone = request('phone');
        $staffUser->dob = request('dob');
        $staffUser->password = Hash::make(request('password'));
        $staffUser->slug = Str::slug(request('name'));
        $staffUser->save();

        $staffMember = new Staff();
        $staffMember->user_id = $staffUser->id;
        $staffMember->name = request('name');
        $staffMember->email = request('email');
        $staffMember->phone = request('phone');
        $staffMember->dob = request('dob');
        $staffMember->gender = request('gender');
        $staffMember->slug = Str::slug(request('name'));
        $staffMember->description = null;



        if (request('photo')) {
            $staffMember->photo = request('photo')->store('images');
        }
        $staffMember->save();
        $staffUser->roles()->attach(Role::find(3)); // Giả sử role_id cho "Staff" là 3
        session()->flash('staff-create-message', 'Staff created successfully.....');
        return back()->withErrors(['Error' => 'An error occurred while creating the staff member.']);
    }

    public function update(Staff $staffMember) {

        $inputs = request()->validate([
            'user_id' => 'required',
            'name'=> 'required',
            'gender' => 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'dob' => 'required',
            'photo' => 'file',
            'description' => 'nullable'
        ]);

        $staffMember->name = $inputs['name'];
        $staffMember->gender = $inputs['gender'];
        $staffMember->email = $inputs['email'];
        $staffMember->phone = $inputs['phone'];
        $staffMember->dob = $inputs['dob'];
        $staffMember->description = $inputs['description'];



        if (request()->hasFile('photo')) {
            $inputs['photo'] = request('photo')->store('images');
            $staffMember->photo = $inputs['photo'];
        }

        $staffMember->update();
        session()->flash('staff-update-message', 'Staff member updated successfully.....');
        return redirect()->route('staff.view');
    }

    public function delete(Staff $staffMember) {
        $staffMember->delete();
        session()->flash('staff-delete-message', 'Staff member deleted successfully.....');
        return back();
    }

}
?>

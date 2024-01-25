<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Role;
use App\Models\User;
use Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{

    public function index() {
        $staffs = Staff::all();
    	return view('admin.staffs.view', compact('staffs'));
    }

    public function store(Request $request) {

        request()->validate([
            'name'=> 'required|string',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date_format:Y-m-d',
            'phone'=> 'required',
            'email'=> 'required|email|string',
            'description' => 'nullable',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $staffUser = new User();
        $staffUser->name = request('name');
        $staffUser->gender = request('gender');
        $staffUser->dob = request('dob');
        $staffUser->phone = request('phone');
        $staffUser->email = request('email');
        $staffUser->password = Hash::make(request('password'));
        $staffUser->slug = Str::slug(request('name'));
        $staffUser->save();

        $staff = new Staff();
        $staff->user_id = $staffUser->id;
        $staff->name = request('name');
        $staff->gender = request('gender');
        $staff->dob = request('dob');
        $staff->phone = request('phone');
        $staff->email = request('email');
        $staff->slug = Str::slug(request('name'));
        $staff->description = null;

        $staff->save();
        $staffUser->roles()->attach(Role::find(3)); // Giả sử role_id cho "Staff" là 3
        session()->flash('staff-create-message', 'Staff created successfully.....');
        return back()->withErrors(['Error' => 'An error occurred while creating the staff member.']);
    }

    public function update(Staff $staff) {

        $inputs = request()->validate([
            'user_id' => 'required',
            'name'=> 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'description' => 'nullable'
        ]);

        $staff->name = $inputs['name'];
        $staff->gender = $inputs['gender'];
        $staff->dob = $inputs['dob'];
        $staff->phone = $inputs['phone'];
        $staff->email = $inputs['email'];
        $staff->description = $inputs['description'];

        $staff->update();
        session()->flash('staff-update-message', 'Staff member updated successfully.....');
        return redirect()->route('staffs.view');
    }

    public function delete(Staff $staff) {
        $staff->delete();
        session()->flash('staff-delete-message', 'Staff member deleted successfully.....');
        return back();
    }

}
?>

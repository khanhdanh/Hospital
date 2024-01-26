<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Department;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;


class AppointmentController extends Controller
{

    public function index() {
        $appointments = Appointment::all();
        return view('admin.appointment.view', compact('appointments'));
    }

    public function appointment_store() {
        $inputs = request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'blood_group' => 'required',
            'department' => 'required',
            'appointment_time' => 'required'
        ]);

        $apt = request('appointment_time');
        Mail::to('sahir@gmail.com')->send(new AppointmentMail($apt));
        Appointment::create($inputs);
        return back()->with('message', 'Your appointment will be confirmed through return e-mail or telephonic communication. Please be informed that this submission of “Request for Appointment” will only be workable after confirmation by our Appointment Centre. Confirmation of an appointment depends upon the availability of doctors at your preferred date and time.');
    }

    public function create()
    {
        $appointments = Appointment::all();

        return view('admin.appointment.add', compact('appointments'));
    }

    public function update(Appointment $appointment) {

        $inputs = request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'blood_group' => 'required',
            'department' => 'required',
            'appointment_time' => 'required'
        ]);

        $appointment->name = $inputs['name'];
        $appointment->phone = $inputs['phone'];
        $appointment->email = $inputs['email'];
        $appointment->dob = $inputs['dob'];
        $appointment->blood_group = $inputs['blood_group'];
        $appointment->department = $inputs['department'];
        $apointment->appointment_time = $inputs['appointment_time'];

        $appointment->update();
        session()->flash('appointment-update-message', 'Appointment updated successfully.....');
        return redirect()->route('appointment.view');
    }

    public function delete(Appointment $appointment) {
        $appointment->delete();
        session()->flash('appointment-delete-message', 'Appointment deleted successfully.....');
        return back();
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Role;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::paginate(10);
        return view('components.admin.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        $schedFields = [
            'mon' => 'Monday',
            'tue' => 'Tuesday',
            'wed' => 'Wednesday',
            'thu' => 'Thursday',
            'fri' => 'Friday',
            'sat' => 'Saturday',
            'sunday' => 'Sunday'
        ];

        return view('components.admin.staff.create', compact('schedFields', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'firstname' => 'required|min:2',
                'middlename' => 'required',
                'lastname' => 'required|min:2',
                'address' => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'birthdate' => 'required|date',
                'role' => 'required',
                'salary' => '',
                'schedule' => 'required',
                'time' => 'required',
                'emergency_number' => 'nullable',
            ]);
            
            $staff = new Staff;
            
            $staff->firstname        =  $validate['firstname'];
            $staff->middlename       =  $validate['middlename'];
            $staff->lastname         =  $validate['lastname'];
            $staff->address          =  $validate['address'];
            $staff->phone            =  $validate['phone'];
            $staff->email            =  $validate['email'];
            $staff->birthdate        =  $validate['birthdate'];
            $staff->role             =  $validate['role'];
            $staff->schedule         =  implode(',', $request->schedule);
            $staff->salary           =  $validate['salary'];
            $staff->time             =  $validate['time'];
            $staff->emergency_number =  $validate['emergency_number'];

            $staff->save();

            // Staff::create($validate); 
            return redirect()->route('staff.index')->with('success', 'New staff has been added');
        } catch(\Exception $e) {
            
            return redirect()->route('staff.index')->with('error', 'Opps! Something went wrong' . $e->getMessage());
        }
        
        
    }
    /**
     * Show the form for editing the specified resource.
     * @param int
     * @return view edit staff
     */
    public function edit(Staff $staff)
    {
        $roles = Role::all();

        $schedFields = [
            'mon' => 'Monday',
            'tue' => 'Tuesday',
            'wed' => 'Wednesday',
            'thu' => 'Thursday',
            'fri' => 'Friday',
            'sat' => 'Saturday',
            'sunday' => 'Sunday'
        ];

        return view('components.admin.staff.edit', compact('staff', 'roles', 'schedFields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validate = $request->validate([
            'firstname' => 'required|min:2',
            'middlename' => 'required',
            'lastname' => 'required|min:2',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'birthdate' => 'required|date',
            'role' => '',
            'salary' => 'required|numeric',
            'emergency_number' => 'nullable',
            'schedule' => 'required',
            'time' => 'required',
        ]);

        $staff->update($validate);
        return redirect()->route('staff.index')->with('success', 'New staff has been added');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
     
        try {

            $staff->delete();
            return redirect()->route('staff.index')->with('success', 'Staff has been removed');
        } catch(\Exception $e) {

            return redirect()->route('staff.index')->with('error', 'Opps! Something went wrong' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\employees;
use App\Models\companies;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = employees::with('company')->get();
        $employee = employees::paginate(10);
        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = companies::all();
        return view('employee.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'FirstName'=>'Required',
            'LastName'=>'Required',
            'company'=>'Required',
            'Email'=>'Required|email|unique:employees',
            'Phone'=>'required|numeric|digits:10'
        ]);

        $employee = new employees();
        $employee->first_name = $req->input('FirstName');
        $employee->last_name = $req->input('LastName');
        $employee->company_id = $req->input('company');
        $employee->email = $req->input('Email');
        $employee->phone = $req->input('Phone');


        $res = $employee->save();
        
        if($res)
        {
            return back()->with('success','Employee Registered Successfully');
        }
        else
        {
            return back()->with('fail','Employee Did Not Registered Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req)
    {
        /* $req->validate([
            'Username'=>'Required',
            'Email'=>'Email|unique:users'
        ]); */
        $employee = employees::find($req->input('id'));
        $employee->first_name = $req->input('FirstName');
        $employee->last_name = $req->input('LastName');
        $employee->company_id = $req->input('company');
        $employee->email = $req->input('Email');
        $employee->phone = $req->input('Phone');
        $res = $employee->save();
        if($res)
        {
            return back()->with('success','Employee Updated Successfully');
        }
        else
        {
            return back()->with('fail','Employee Did Not Updated');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $employee = employees::find($id);
        return view('employee.update',compact('employee'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $employee = employees::find($id);
        $employee->delete();
        return redirect('employee');
    }
}

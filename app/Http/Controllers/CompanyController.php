<?php

namespace App\Http\Controllers;

use App\Models\companies;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = companies::paginate(10);
        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
       $file = $req->file('image');
        $req->validate([
            'company'=>'Required',
            'email'=>'Required|email|unique:companies',
            'image'=>'required|image|dimensions:min_width=100,min_height=100',
            'website'=>'Required'
        ]);

        $company = new companies();
        $company->name = $req->input('company');
        $company->email = $req->input('email');
        $file = $req->file('image');
        $company->logo = $file->getClientOriginalName();
        $destinationPath = 'storage/uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $company->website = $req->input('website');

        $res = $company->save();
        
        if($res)
        {
            return back()->with('success','Company Registered Successfully');
        }
        else
        {
            return back()->with('fail','Company Did Not Registered Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req)
    {

        $company = companies::find($req->input('id'));
        $company->name = $req->input('company');
        $company->email = $req->input('email');
        $company->website = $req->input('website');
        $file = $req->file('image');
        $company->logo = $file->getClientOriginalName();
        $destinationPath = 'storage/uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        
        $res = $company->save();
        if($res)
        {
            return back()->with('success','Company Updated Successfully');
        }
        else
        {
            return back()->with('fail','Company Did Not Updated');
        }
    }

    public function update($id)
    {
        $company = companies::find($id);
        return view('company.update',compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $company = companies::find($id);
        $company->delete();
        return redirect('company');
    }
}

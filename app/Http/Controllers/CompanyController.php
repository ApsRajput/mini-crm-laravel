<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\User;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //     $company = new Company;
    //     $user = new User;
        $users = User::all(['id', 'name']);

        return view('company.create', 
            [
                'users' => $users
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'website' => 'required',
            'user_id'=> 'required|numeric'


        ]);

        if ($validator->fails()) {
            return redirect('company/create')
                     ->withErrors($validator)
                     ->withInput();
        }
        // store each form field in a variable

        $name= $request->name;
        $email= $request->email;
        $website= $request->website;
        $userId= $request->user_id;

        // save to the database

        $company = new Company;
        $company->name = $name;
        $company->email = $email;
        $company->website = $website;
        $company->user_id = $userId;
       
        $company->save();

        // Redirect to company/create
        return redirect('/company/index')->with('success', 'Company saved!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $users = User::all(['id', 'name']);

        return view('company.edit', 

        [
            'company' => $company,
            'users' => $users
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'user_id'=> 'required|numeric'
            
        ]);

        $updateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'user_id'=> 'required|numeric'
        ]);
        Company::whereId($id)->update($updateData);

        // Redirect to company/create
        return redirect('/company/index')->with('success', 'Company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect('/company/index')->with('success', 'Company deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\Company;
use App\Model\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $allcompany = Company::paginate(13);
        return View('Admin.Company.index', compact('allcompany'));
    }

    public function create()
    {
        return View('Admin.Company.Add');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'CompanyName' => 'required|unique:companies|max:255',
            'Address' => 'required|max:255',
            'Country' => 'required|max:255',
        ]);

        $data = array();
        $data['CompanyName'] = $request->CompanyName;
        $data['Address'] = $request->Address;
        $data['Country'] = $request->Country;

        $DBAAccess = new CarTradingDBAccess();

        if ($DBAAccess->AddCompany($data)) {
            $msg = "Company has been added successfully!";
            return back()->with('message', $msg);
        } else {
            $msg = "Company has not been added successfully, Please try again  later!!!";
            return back()->with('message', $msg);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::find($id);

        return view('Admin.Company.edit', compact('company', 'id'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        if ($company->CompanyName != $request->CompanyName) {
            $validatedData = $this->validate($request, [
                'CompanyName' => 'required|unique:companies|max:255',
                'Address' => 'required|max:255',
                'Country' => 'required|max:255',
            ]);

        } else {
            $validatedData = $this->validate($request, [
                'Address' => 'required|max:255',
                'Country' => 'required|max:255',
            ]);

        }

        $data = array();
        $data['CompanyID'] = $id;
        $data['CompanyName'] = $request->CompanyName;
        $data['Address'] = $request->Address;
        $data['Country'] = $request->Country;

        $DBAAccess = new CarTradingDBAccess();

        if ($DBAAccess->UpdateCompany($data)) {
            $msg = "Company has been updated successfully!";
            return redirect()->route('company.index')->with('message', $msg);

        } else {
            $msg = "Company has not been updated successfully, Please try again  later!!!";
            return back()->with('message', $msg);
        }
    }
    public function destroy($id)
    {
        //
    }
}

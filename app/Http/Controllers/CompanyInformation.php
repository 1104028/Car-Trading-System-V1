<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\ClientInformation;
use Illuminate\Http\Request;

class CompanyInformation extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $clientInformations = ClientInformation::where('Companyid', 1)->first();
        return view('Admin.Client.create', compact('clientInformations'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'COmpanyName' => 'required|string|max:255',
            'CompanyAddress' => 'required',
            'CompanySlogan' => 'required|string|max:255',
            'CompanyTitle' => 'required|string|max:255',
            'PhoneNo' => 'required|string|max:255',
            'MobileNo' => 'required|string|max:255',
            'Email' => 'required|string|max:255',
            'GoogleMapLink' => 'required|string|max:255',
            'CompanyLogo' => 'required | max:1000',
        ]);

        $data = array();
        $data['COmpanyName'] = $request->COmpanyName;
        $data['CompanyAddress'] = $request->CompanyAddress;
        $data['CompanySlogan'] = $request->CompanySlogan;
        $data['CompanyTitle'] = $request->CompanyTitle;
        $data['PhoneNo'] = $request->PhoneNo;
        $data['MobileNo'] = $request->MobileNo;
        $data['Email'] = $request->Email;
        $data['PhoneNo'] = $request->PhoneNo;
        $data['GoogleMapLink'] = $request->GoogleMapLink;
        $data['FacebookLink'] = $request->FacebookLink;
        $data['GooglePlusLink'] = $request->GooglePlusLink;
        $data['TwitterLink'] = $request->TwitterLink;
        $data['LinkedinLink'] = $request->LinkedinLink;

        if ($request->hasFile('CompanyLogo')) {
            $image = $request->file('CompanyLogo');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $logo_name = "Company_Logo.jpg";
            $destinationPath = public_path('/images/logo');
            $image->move($destinationPath, $logo_name);

            $data['CompanyLogo'] = $logo_name;

        }

        $DBAAccess = new CarTradingDBAccess();

        $clientInformations = ClientInformation::where('Companyid', 1)->first();

        if ($clientInformations != null) {
            if ($DBAAccess->UpdateClientInformations($data)) {
                $msg = "Client Informations has been updated successfully.";
                return redirect()->route('adminindex')->with('message', $msg);
            } else {
                $msg = "Client Informations has been updated successfully, Please Try Again";
                return back()->with('message', $msg);
            }

        } else {
            if ($DBAAccess->AddClientInformations($data)) {
                $msg = "Client Informations has been added successfully.";
                return redirect()->route('adminindex')->with('message', $msg);
            } else {
                $msg = "Client Informations has been added successfully, Please Try Again";
                return back()->with('message', $msg);
            }

        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

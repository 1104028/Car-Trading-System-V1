<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\Country;
use App\Model\SeaPort;
use Illuminate\Http\Request;

class SeaPortController extends Controller
{
    public function index()
    {
        $seaports = SeaPort::with('countries')->paginate(13);
        return View('Admin.SeaPort.index', compact('seaports'));
    }

    public function create()
    {
        $allcountry = Country::all();
        return View('Admin.SeaPort.Add', compact('allcountry'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'SerPortName' => 'required|max:255',
            'SerPortCode' => 'required|unique:seaports|max:255',
            'CountryID' => 'required',
        ]);

        $data = array();

        $data['SerPortCode'] = $request->SerPortCode;
        $data['SerPortName'] = $request->SerPortName;
        $data['CountryID'] = $request->CountryID;

        $DBAAccess = new CarTradingDBAccess();

        if ($DBAAccess->AddSeaPortAdmin($data)) {
            $msg = "SeaPort has been added successfully!";
            return back()->with('message', $msg);
        } else {
            $msg = "SeaPort has not been added successfully, Please try again  later!!!";
            return back(compact('request'))->with('message', $msg);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $seaport = SeaPort::find($id);
        $allcountry = Country::all();

        return view('Admin.SeaPort.edit', compact('seaport', 'id', 'allcountry'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'SerPortName' => 'required|max:255',
            'SerPortCode' => 'required|unique:seaports|max:255',
        ]);

        $data = array();

        $data['SeaPortID'] = $id;
        $data['SerPortCode'] = $request->SerPortCode;
        $data['SerPortName'] = $request->SerPortName;

        if ($request->CountryID != null) {
           $data['CountryID'] = $request->CountryID;

        }

        $DBAAccess = new CarTradingDBAccess();

        if ($DBAAccess->UpdateSeaPort($data)) {
            $msg = "SeaPort has been updated successfully!";
            return redirect()->route('seaport.index')->with('message', $msg);

        } else {
            $msg = "SeaPort has not been updated successfully, Please try again  later!!!";
            return back()->with('message', $msg);
        }
    }

    public function destroy($id)
    {
        //
    }
}

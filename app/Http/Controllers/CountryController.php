<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $allcountry = Country::paginate(13);
        return View('Admin.Country.index', compact('allcountry'));
    }

    public function create()
    {
        return View('Admin.Country.Add');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'CountryName' => 'required|unique:countries|max:255',
        ]);

        $data = new Country();
        $data->CountryName = $request->CountryName;

        $DBAAccess = new CarTradingDBAccess();

        if ($DBAAccess->AddCountry($data)) {
            $msg = "Country has been added successfully!";
            return back()->with('message', $msg);
        } else {
            $msg = "Country has not been added successfully, Please try again  later!!!";
            return back()->with('message', $msg);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $country = Country::find($id);

        return view('Admin.Country.edit', compact('country', 'id'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'CountryName' => 'required|unique:countries|max:255',
        ]);

        $data = array();
        $data['CountryID'] = $id;
        $data['CountryName'] = $request->CountryName;

        $DBAAccess = new CarTradingDBAccess();
        $add = $DBAAccess->UpdateCountry($data);

        if ($add == true) {
            $msg = "Country has been updated successfully!!";
            return redirect()->route('country.index')->with('message', $msg);
        } else {
            $msg = "Country has not been updated successfully, Please try again later!";
            return back()->with('message', $msg);
        }

    }

    public function destroy($id)
    {
        //
    }
}

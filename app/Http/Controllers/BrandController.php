<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\Brand;
use App\Model\Company;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $allbrands = Brand::with('companies')->paginate(13);
        return View('Admin.Brand.index', compact('allbrands'));
    }

    public function create()
    {
        $allcompany = Company::all();
        return View('Admin.Brand.Add', compact('allcompany'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'BrandName' => 'required|unique:brands|max:255',
        ]);

        $data = array();
        $data['BrandName'] = $request->BrandName;
        $data['CompanyID'] = $request->CompanyID;

        $DBAAccess = new CarTradingDBAccess();

        if ($DBAAccess->AddBrand($data)) {
            $msg = "Brand has been added successfully!";
            return back()->with('message', $msg);
        } else {
            $msg = "Brand has not been added successfully, Please try again  later!!!";
            return back()->with('message', $msg);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        $allcompany = Company::all();

        return view('Admin.Brand.edit', compact('brand', 'id', 'allcompany'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $this->validate($request, [
            'BrandName' => 'required|unique:brands|max:255',
        ]);

        $data = array();
        $data['BrandID'] = $id;
        $data['BrandName'] = $request->BrandName;
        if($request->CompanyID!=null)
            $data['CompanyID'] = $request->CompanyID;

        $DBAAccess = new CarTradingDBAccess();

        if ($DBAAccess->UpdateBrand($data)) {
            $msg = "Brand has been updated successfully!";
            return redirect()->route('brand.index')->with('message', $msg);

        } else {
            $msg = "Brand has not been updated successfully, Please try again  later!!!";
            return back()->with('message', $msg);
        }
    }

    public function destroy($id)
    {
        //
    }
}

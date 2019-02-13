<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\BestSellingCar;
use App\Model\Brand;
use App\Model\CarModel;
use App\Model\Company;
use Illuminate\Http\Request;

class BestSellerController extends Controller
{
    public function index()
    {
        $allbestseeelingcars = BestSellingCar::with('carmodels')->get();
        return view('Admin.BestSeller.index', compact('allbestseeelingcars'));
    }

    public function create()
    {
        $allcompany = Company::all();
        $allbrands = Brand::all();
        $allcars = CarModel::all();

        return View('Admin.BestSeller.Add', compact('allcompany', 'allbrands', 'allcars'));
    }

    public function store(Request $request)
    {
        $data = array();
        $data['ModelID'] = $request->ModelID;

        $DBAAccess = new CarTradingDBAccess();
        $add = $DBAAccess->AddBestSellingCar($data);

        if ($add == true) {
            $msg = "Best Selling Car has been added successfully!!";
            return back()->with('message', $msg);
        } else {
            $msg = "Best Selling Car has not been added successfully, Please try again later!";
            return back()->with('message', $msg);
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $allcompany = Company::all();
        $allbrands = Brand::all();
        $allcars = CarModel::all();

        return View('Admin.BestSeller.update', compact('allcompany', 'allbrands', 'allcars', 'id'));

    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['BestSellingCarID'] = $id;
        $data['ModelID'] = $request->ModelID;

        $DBAAccess = new CarTradingDBAccess();
        $add = $DBAAccess->UpdateBestSellingCar($data);

        if ($add == true) {
            $msg = "Best Selling Car has been updated successfully!!";
           return redirect()->route('bestseller.index')->with('message', $msg);
        } else {
            $msg = "Best Selling Car has not been updated successfully, Please try again later!";
            return back()->with('message', $msg);
        }

    }

    public function destroy($id)
    {

    }
}

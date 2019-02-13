<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer\CarTradingDBAccess;
use App\Model\BodyType;
use App\Model\AdminAccount;
use App\Model\BankAccountInformation;
use App\Model\BankPay;
use App\Model\BestSellingCar;
use App\Model\Brand;
use App\Model\CarImage;
use App\Model\CarModel;
use App\Model\Company;
use App\Model\Country;
use App\Model\EmailInformation;
use App\Model\LatestCar;
use App\Model\Order;
use App\Model\OrderInvoice;
use App\Model\SeaPort;

class LatestCarController extends Controller
{
   public function index()
    {
        $alllatestcars = LatestCar::with('carmodels')->get();
        return view('Admin.LatestCar.index', compact('alllatestcars'));
    }

    public function create()
    {
        $allcompany = Company::all();
        $allbrands = Brand::all();
        $allcars = CarModel::all();

        return View('Admin.LatestCar.Add', compact('allcompany', 'allbrands', 'allcars'));
    }

    public function store(Request $request)
    {
        $data = array();
        $data['ModelID'] = $request->ModelID;

        $DBAAccess = new CarTradingDBAccess();
        $add = $DBAAccess->AddLatestCar($data);

        if ($add == true) {
            $msg = "Latest Car has been added successfully!!";
            return back()->with('message', $msg);
        } else {
            $msg = "Latest Car has not been added successfully, Please try again later!";
            return back()->with('message', $msg);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $allcompany = Company::all();
        $allbrands = Brand::all();
        $allcars = CarModel::all();

        return View('Admin.LatestCar.update', compact('allcompany', 'allbrands', 'allcars', 'id'));

    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['LatestCarID'] = $id;
        $data['ModelID'] = $request->ModelID;

        $DBAAccess = new CarTradingDBAccess();
        $add = $DBAAccess->UpdateLatestCar($data);

        if ($add == true) {
            $msg = "Latest Car has been updated successfully!!";
           return redirect()->route('latestcar.index')->with('message', $msg);
        } else {
            $msg = "Latest Car has not been updated successfully, Please try again later!";
            return back()->with('message', $msg);
        }

    }

    public function destroy($id)
    {
        //
    }
}

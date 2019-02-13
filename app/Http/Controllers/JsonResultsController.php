<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class JsonResultsController extends Controller
{
    public function BrandList(Request $request)
    {
        $id = $request->id;
        $data = DB::select('select BrandID,BrandName from brands where CompanyID=' . $id);
        return response()->json($data);
    }

    public function ModelList(Request $request)
    {
        $id = $request->id;
        $data = DB::select('select ModelID,ModelName from carmodels where BrandID=' . $id);
        return response()->json($data);
    }

    public function SeaPortList(Request $request)
    {
        $id = $request->id;
        $data = DB::select('select SeaPortID,SerPortCode,SerPortName from seaports where CountryID=' . $id);
        return response()->json($data);
    }

    public function VerificationCode(Request $request)
    {
        $pin = mt_rand(100000, 999999);

        $verification_code = str_shuffle($pin);

        $objDemo = new \stdClass();
        $objDemo->verification_code = $verification_code;
        try {
            Mail::to($request->email)->send(new SendMail($objDemo));
            $data1['EmailSend'] = true;

        } catch (\Exception $e) {
            $data1['EmailSend'] = false;
        }

        $data1['Code'] = $objDemo->verification_code;
        return response()->json($data1);
    }
    public function IsModelNameExists(Request $request)
    {
      
        $id = $request->id;
       
        $data = CarModel::where('ModelName',$id)->first();
        if($data!=null)
        {
            $value = true;
        }
        else {
            $value= false;
        }
        return response()->json($value);
    }

    public function ClientInformation(Request $request)
    {
      
        $DBAAccess = new CarTradingDBAccess();

        $orderno = Order::max('OrderID');
        $data = array();
        $data['IPAddress'] = $request->IPAddress;
        $data['OrderID'] = $orderno->OrderID;
        $data['CountryName'] = $request->CountryName;
        $data['City'] = $request->City;
        $data['Region'] = $request->Region;
        $data['PostalCode'] = $request->PostalCode;
        $data['Latitude'] = $request->Latitude;
        $data['Longitude'] = $request->CountryName;
        
        $add = $DBAAccess->AddClientSecurityInforamtion($data);

        $value= 'ok';
        return response()->json($value);
    }
}

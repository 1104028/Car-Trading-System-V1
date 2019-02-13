<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Mail\OrderMail;
use App\Mail\QueryMail;
use App\Model\BestSellingCar;
use App\Model\BodyType;
use App\Model\CarModel;
use App\Model\Company;
use App\Model\Country;
use App\Model\EmailInformation;
use App\Model\LatestCar;
use App\Model\OrderInvoice;
use App\Model\SeaPort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $bestsellingcar = BestSellingCar::with('carmodels', 'carimages')->get();
        $latestcar = LatestCar::with('carmodels', 'carimages')->get();

        return view('Home.index', compact('bestsellingcar', 'latestcar'));
    }

    public function Buy($CompanyID, $BodyType, $YearMin, $YearMax, $PriceMin, $PriceMax)
    {
        $allcars = CarModel::with('brands')->get();

        $previousparameter = array();
        $previousparameter['CompanyID'] = $CompanyID;
        $previousparameter['BodyType'] = $BodyType;
        $previousparameter['YearMin'] = $YearMin;
        $previousparameter['YearMax'] = $YearMax;
        $previousparameter['PriceMin'] = $PriceMin;
        $previousparameter['PriceMax'] = $PriceMax;

        $previousparameter = (object) $previousparameter;
        if ($CompanyID != 0) {
            $allcars = $allcars->where('brands.CompanyID', $CompanyID);
        }

        if ($BodyType != 0) {
            $allcars = $allcars->where('BodyTypeID', $BodyType);
        }

        if ($YearMin != 0 && $YearMax != 0) {
            $allcars = $allcars->where('YearOfRelease', '>=', $YearMin);
            $allcars = $allcars->where('YearOfRelease', '<=', $YearMax);
        }

        if ($PriceMin != 0 && $PriceMax != 0) {
            $allcars = $allcars->where('Price', '>=', $PriceMin);
            $allcars = $allcars->where('Price', '<=', $PriceMax);
        }

        $allbodytype = BodyType::all();
        $allcompany = Company::all();

        return view('Home.Buy', compact('allcars', 'previousparameter', 'allbodytype', 'allcompany'));
    }

    public function About()
    {
        return view('Home.About');
    }

    public function Contact()
    {
        return view('Home.Contact');
    }

    public function ContactPost(Request $request)
    {
        $data = array();
        $data['FirstName']= $request->FirstName;
        $data['LastName']= $request->LastName;
        $data['Email']= $request->Email;
        $data['Phone_number']= $request->Phone_number;
        $data['Message']= $request->Message;
        $data['Subject']= $request->Subject;

        $DBAAccess = new CarTradingDBAccess();
        $emailinformations = EmailInformation::where('EmailID_PK', 1)->first();

        if ($DBAAccess->AddCustomersQuery($data)) {
            $msg = "Your question has sent successfully!! Our team Will Reply Soon..";
            $objDemo = new \stdClass();
            $objDemo->querydetails = (object) $data;
            try {
                Mail::to($emailinformations->notficationemail)->send(new QueryMail($objDemo));
            } catch (\Exception $e) {
            }

            return back()->with('message', $msg);
        } else {
            $msg = "Sending Failed, Please try again later!!!";
            return back()->with('message', $msg);
        }
    }
    public function CarDetails($carid)
    {
        $cardetails = CarModel::where('ModelID', $carid)->with('bodytype', 'carimages')->first();
        return view('Home.CarDetails', compact('cardetails'));
    }

    public function GetQuotaion($carid)
    {
        $cardetails = CarModel::where('ModelID', $carid)->with('bodytype', 'carimages')->first();
        $countries = Country::all();
        $seaports = SeaPort::all();
        return view('Home.GetQuotaion', compact('cardetails', 'countries', 'seaports'));
    }

    public function GetQuotaionPost(Request $request)
    {
    
        $DBAAccess = new CarTradingDBAccess();

        $data = array();
        $data['ModelID'] = $request->ModelID;
        $data['CustomerName'] = $request->FullName;
        $data['CustomerEmail'] = $request->Email;
        $data['CustomerContactNumber'] = $request->ContactNumber;
        $data['CustomerAddress'] = $request->Address;
        $data['OtherSeaport'] = $request->SeaPortName;
        $data['OtherCountryName'] = $request->CountryName;
        if ($request->DeliveryAddress == null) {
            $data['DeliveryAddress'] = "Self";
        } else {
            $data['DeliveryAddress'] = $request->DeliveryAddress;
        }

        if ($request->SeaPortID == null) {
            $otherseaportid = $DBAAccess->GetOtherSeaPortId();
            if ($otherseaportid != null) {
                $data['SeaPortID'] = $otherseaportid;
            }
        } else {
            $data['SeaPortID'] = $request->SeaPortID;
        }
        if ($request->OrderStatus == null) {
            $data['OrderStatus'] = "Not Completed";
        }

        $add = $DBAAccess->AddQuotation($data);

        $emailinformations = EmailInformation::where('EmailID_PK', 1)->first();

        if ($add == true) {
            $msg = "Your Quotation has been requested successfully!! Our team Will Contact With You Soon..";
            $objDemo = new \stdClass();
            $objDemo->orderdetails = (object) $data;
            try {
                Mail::to($emailinformations->notficationemail)->send(new OrderMail($objDemo));
            } catch (\Exception $e) {
            }

            return back()->with('message', $msg);
        } else {
            $msg = "Operation Failed, Please try again later!!!";
            return back()->with('message', $msg);
        }
    }

    public function Paybill()
    {
        return view('Home.Paybill');
    }

    public function BankTransaction()
    {
        return view('Home.BankTransaction');
    }

    public function BankTransactionPost(Request $request)
    {
        $DBAAccess = new CarTradingDBAccess();

        $invoiceno = OrderInvoice::where('InvoiceNo', $request->InvoiceNo)->first();

        if ($request->InvoiceNo != $invoiceno->InvoiceNo) {
            $msg = "Invalid Invoice number, Please Try again...";
            return back()->with('message', $msg);
        }
        $validatedData = $this->validate($request, [
            'InvoiceNo' => 'required|string|max:255',
            'BankName' => 'required|string|max:255',
            'BranchName' => 'required|string|max:255',
            'BankIdentifierCode' => 'required|string|max:255',
            'AccountNumber' => 'required',
            'AccountName' => 'required|string|max:255',
            'Date' => 'required',
            'Amount' => 'required',
        ]);

        $data = array();
        $data['OrderInvoiceID'] = $invoiceno->OrderInvoiceID;
        $data['BankName'] = $request->BankName;
        $data['BranchName'] = $request->BranchName;
        $data['BankIdentifierCode'] = $request->BankIdentifierCode;
        $data['AccountNumber'] = $request->AccountNumber;
        $data['AccountName'] = $request->AccountName;
        $data['Date'] = $request->Date;
        $data['Amount'] = $request->Amount;

        if ($request->hasFile('BankReceipt')) {
            $image = $request->file('BankReceipt');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $bank_receipt = "InvoiceNO-" . $request->InvoiceNo . ".jpg";
            $destinationPath = public_path('/images/BankReceipt');
            $image->move($destinationPath, $bank_receipt);
            $data['BankReciptImage'] = $bank_receipt;
        }

        if ($DBAAccess->AddBankTransactions($data)) {
            $msg = "Your Transaction has been completed successfully, Our Team Will contact with you soon.";
            $updateorderstatus = array();
            $updateorderstatus['OrderID'] = $invoiceno->OrderID;
            $updateorderstatus['OrderStatus'] = "Payment Completed";

            $DBAAccess->UpdateQuotation($updateorderstatus);

            return back()->with('message', $msg);
        } else {
            $msg = "Your Transaction has not been completed successfully, Please Try Again";
            return back()->with('message', $msg);
        }
    }

}

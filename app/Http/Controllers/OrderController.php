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
use PDF;
use Terbilang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class OrderController extends Controller
{
    public function index()
    {
        $allorders = Order::orderBy('OrderID', 'DESC')->with('allmodels')->get();
        return view('Admin.Order.index', compact('allorders'));
    }

    public function Invoice($oderid)
    {
        $allorders = Order::with('allmodels', 'seaport')->where('OrderID', $oderid)->first();
        $mytime = Carbon::now();
        
        $mytime = $mytime->toDateTimeString();
        
        list($part1,$part2,$part3) = explode('-', $mytime);
        
        list($part3) = explode(' ', $part3);
     
        $invoiceno = str_random(10).$part2.$part3.$part1;
        
        return view('Admin.Order.Invoice', compact('allorders', 'invoiceno'));
    }

    public function InvoicePost(Request $request)
    {
       $data = array();
       $data['InvoiceNo']= $request->InvoiceNo;
       $data['OrderID']= $request->OrderID;
       $data['BasePrice']= $request->BasePrice;
       $data['SeaPortCost']= $request->SeaPortCost;
       $data['TranspotationCost']= $request->TranspotationCost;
       $data['ConsumptionCost']= $request->ConsumptionCost;
       $data['DocumentationCost']= $request->DocumentationCost;
       $data['RecyclingCost']= $request->RecyclingCost;
       $data['InspectionCost']= $request->InspectionCost;
       
       $quotation = $request;

       $totalprice = $request->BasePrice + $request->SeaPortCost + $request->TranspotationCost + $request->ConsumptionCost + $request->DocumentationCost + $request->RecyclingCost + $request->InspectionCost;

       $amountinword= Terbilang::make($totalprice, ' dollars');

       $DBAAccess = new CarTradingDBAccess();
       $add = $DBAAccess->AddOrderInvoice($data);

       if ($add == true) {
        $allorders = Order::with('allmodels', 'seaport')->where('OrderID', $request->OrderID)->first();
        $objDemo = new \stdClass();
        $objDemo->quotation = (object)$quotation;
        $objDemo->allorders = (object)$allorders;
        $objDemo->totalprice = $totalprice;
        $objDemo->amountinword = $amountinword;

        try {
            Mail::to($request->CustomerEmail)->send(new InvoiceMail($objDemo));

            $updateorderstatus = array();
            $updateorderstatus['OrderID']=$request->OrderID;
            $updateorderstatus['OrderStatus']="Invoice Sent";

            if($DBAAccess->UpdateQuotation($updateorderstatus))
            {
                $msg = "Invoice has been sent successfully..";
            }
            else {
                $msg = "Invoice sending failed..";
            }
            return redirect()->route('order.index')->with('message', $msg);

        } catch (\Exception $e) {
           
        }

    } else {
        $msg = "PDF Couldn't be generated successfully, Please try again later!";
        return back()->with('message', $msg);
    }
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

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

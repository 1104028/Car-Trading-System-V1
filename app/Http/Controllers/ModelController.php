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
use Carbon\Carbon;

class ModelController extends Controller
{
    public function index()
    {
      $allmodels = CarModel::with('bodytype')->paginate(13);
      return View('Admin.index',compact('allmodels'));
    }

    public function create()
    {
        $allcompany = Company::all();
        $allbrands = Brand::all();
        $allyears = array();
        $mytime = Carbon::now();
        $mytime = $mytime->toDateTimeString();
        list($part1) = explode('-', $mytime);
        $currentyear = (int)$part1;

        for ($i = 0; $i < 50; $i++) {
            $allyears[$i] = ($currentyear - $i);
        }

        $allbodytype = BodyType::all();


        return View('Admin.Model.Add', compact('allcompany', 'allbrands', 'allyears', 'allbodytype'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'ModelName' => 'required|unique:carmodels|max:255',
        ]);

        $data = array();
        $data['ModelName'] = $request->ModelName;
        $data['CompanyID'] = $request->CompanyID;
        $data['BrandID'] = $request->BrandID;
        $data['YearOfRelease'] = $request->YearOfRelease;
        $data['Price'] = $request->Price;
        $data['BodyTypeID'] = $request->BodyTypeID;
        $data['EngineType'] = $request->EngineType;
        $data['Displacement'] = $request->Displacement;
        $data['Power'] = $request->Power;
        $data['Torque'] = $request->Torque;
        $data['Transmission'] = $request->Transmission;
        $data['DriveTrain'] = $request->DriveTrain;
        $data['NumberOfGears'] = $request->NumberOfGears;
        $data['NumberofCylinders'] = $request->NumberofCylinders;
        $data['Performance0To100Kmph'] = $request->Performance0To100Kmph;
        $data['MaximumSpeed'] = $request->MaximumSpeed;
        $data['FuelTankCapacity'] = $request->FuelTankCapacity;
        $data['BodyColor'] = $request->BodyColor;
        $data['Length'] = $request->Length;
        $data['Width'] = $request->Width;
        $data['Height'] = $request->Height;
        $data['Wheelbase'] = $request->Wheelbase;
        $data['GrossWeight'] = $request->GrossWeight;
        $data['SeatingCapacity'] = $request->SeatingCapacity;
        $data['WheelType'] = $request->WheelType;
        $data['FrontTyreSize'] = $request->FrontTyreSize;
        $data['RearTyreSize'] = $request->RearTyreSize;
        $data['FrontBrakeType'] = $request->FrontBrakeType;
        $data['RearBrakeType'] = $request->RearBrakeType;
        $data['FrontSuspension'] = $request->FrontSuspension;
        $data['RearSuspension'] = $request->RearSuspension;
        $data['PowerSteering'] = $request->PowerSteering;
        $data['SteeringType'] = $request->SteeringType;
        $data['NotAvailable'] = false;

        //dd($request);
        $DBAAccess = new CarTradingDBAccess();
        $add = $DBAAccess->AddModel($data);

        if ($add == true) {
            $modelid = $DBAAccess->GetModelIdByName($request->ModelName);
            $msg = "Model has been added successfully!!, Please Add Model Images";
            return redirect()->route('modelimageadd', ['modelid' => $modelid])->with('message', $msg);
        } else {
            $msg = "Operation failed, Please try again later!";
            return back()->with('message', $msg);
        }
    }

    public function AddModelImage($modelid)
    {
        $DBAAccess = new CarTradingDBAccess();
        $model = $DBAAccess->GetModelById($modelid);
        $modelname = $model->ModelName;
        //$Brandname = $model->ModelName;

        return View('Admin.Model.AddModelImage', compact('modelid', 'modelname'));
    }

    public function AddModelImagesPost(Request $request)
    {
        $DBAAccess = new CarTradingDBAccess();
        $DBAAccess->DeleteCarImages($request->ModelID);

        if ($request->hasFile('thumb')) {
            $image = $request->file('thumb');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $thumb_image_name = "ModelID-" . $request->ModelID . "_ThumbImage.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $thumb_image_name);

            $DBAAccess->AddThumbImage($request->ModelID, $thumb_image_name);
        }

        if ($request->hasFile('cardimage')) {
            $image = $request->file('cardimage');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $card_image_name = "ModelID-" . $request->ModelID . "_CardImage.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $card_image_name);

            $DBAAccess->AddCardImage($request->ModelID, $card_image_name);
        }

        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_1.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        if ($request->hasFile('img2')) {
            $image = $request->file('img2');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_2.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        if ($request->hasFile('img3')) {
            $image = $request->file('img3');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_3.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        if ($request->hasFile('img4')) {
            $image = $request->file('img4');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_4.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        if ($request->hasFile('img5')) {
            $image = $request->file('img5');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_5.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        if ($request->hasFile('img6')) {
            $image = $request->file('img6');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_6.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        if ($request->hasFile('img7')) {
            $image = $request->file('img7');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_7.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        if ($request->hasFile('img8')) {
            $image = $request->file('img8');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = "ModelID-" . $request->ModelID . "_8.jpg";
            $destinationPath = public_path('/images/CarImages');
            $image->move($destinationPath, $image_name);

            $DBAAccess->AddModelImage($request->ModelID, $image_name);
        }

        $msg = "Model Images has been uploaded successfully!!";
        return redirect()->route('adminindex')->with('message', $msg);
    }

    public function show($id)
    {
      $cardetails = CarModel::find($id)->with('bodytype','brands','carimages');
      return View('Admin.Model.Details',compact('cardetails'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}

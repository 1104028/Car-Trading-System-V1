<?php

namespace App\DataLayer;

use App\DataLayer\CarTradingDBAccess;
use App\Model\AdminAccount;
use App\Model\BankPay;
use App\Model\BestSellingCar;
use App\Model\BodyType;
use App\Model\Brand;
use App\Model\CarImage;
use App\Model\CarModel;
use App\Model\Company;
use App\Model\Country;
use App\Model\LatestCar;
use App\Model\Order;
use App\Model\OrderInvoice;
use App\Model\SeaPort;
use App\Model\EmailInformation;
use App\Model\ClientInformation;
use App\Model\Contacts;
use App\Model\OrderInformation;

class CarTradingDBAccess
{
    //////////////////////////
/* User */
    public static function IsAdminExist($UserName, $Pass)
    {
        try {
            $model = AdminAccount::where(['UserName' => $UserName, 'Password' => $Pass])->first();

            if ($model != null) {
                return true;
            } else {
                return false;
            }

        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }

    }
//////////////////////////
/* Country */
    public static function IsCountryExist($countryname)
    {
        try {
            $model = Country::where('CountryName', $countryname)->first();

            if ($model != null) {
                return true;
            } else {
                return false;
            }

        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }

    }

    public static function AddCountry(Country $request)
    {
        try {
            $newentry['CountryName'] = $request->CountryName;
            Country::create($newentry);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function UpdateCountry($request)
    {
        try {
            Country::where('CountryID', $request['CountryID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function GetCountryInfoByCountryName($countryname)
    {
        try {
            $model = Country::where('CountryName', $countryname)->first();
            if ($model != null) {
                return $model;
            }

            return null;
        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }
    }

    public static function FindCountryBySeaPortId($seaportid)
    {
        try {
            $model = SeaPort::with('countries')->where('SeaPortID', $seaportid)->first();

            if ($model != null) {
                return $model;
            } else {
                return null;
            }

        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }

    }

//////////////////////////
/* SeaPort */
    public static function AddSeaPort($request)
    {
        try {
            $newentry['SerPortCode'] = $request->SerPortCode;
            $newentry['SerPortName'] = $request->SerPortName;
            $newentry['CountryID'] = $request->CountryID;
            SeaPort::create($newentry);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function AddSeaPortAdmin($request)
    {
        try {
            SeaPort::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function UpdateSeaPort($request)
    {
        try {
            SeaPort::where('SeaPortID', $request['SeaPortID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
    public static function GetOtherSeaPortId()
    {
        try {
            $model = SeaPort::where('SerPortName', 'Other')->first();
            if ($model != null) {
                return $model->SeaPortID;
            }

            return null;
        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }
    }

//////////////////////////
/* BodyType */
    public static function AddBodyStyle(BodyType $request)
    {
        try {
            $newentry['BodyTypeName'] = $request->BodyTypeName;
            $newentry['BodyTypeImage'] = $request->BodyTypeImage;
            BodyType::create($newentry);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function FindBodyTypeNameById($bodytypeid)
    {
        try {
            $model = BodyType::where('BodyTypeID', $bodytypeid)->first();
            if ($model != null) {
                return $model->BodyTypeName;
            }

            return null;
        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }
    }

    public static function UpdateBodyType($request)
    {
        try {
            BodyType::where('BodyTypeID', $request['BodyTypeID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
//////////////////////////
/* Car Model */
    public static function AddModel($request)
    {
        try {
            CarModel::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return false;
        }
    }

    public static function GetModelIdByName($modelname)
    {
        try {
            $model = CarModel::where('ModelName', $modelname)->first();
            if ($model != null) {
                return $model->ModelID;
            }

            return null;
        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }
    }

    public static function GetModelById($modelid)
    {
        try {
            $model = CarModel::where('ModelID', $modelid)->first();
            if ($model != null) {
                return $model;
            }

            return null;
        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }
    }

    public static function DeleteCarImages($modelid)
    {
        try {
            $model = CarImage::where('ModelID', $modelid)->first();
            if ($model != null) {
                CarImage::findOrFail($modelid)->delete();
            }

        } catch (\Illuminate\Database\QueryException $e) {

        }
    }
//////////////////////////
/* Car Images */
    public static function AddThumbImage($ModelID, $src)
    {
        try {
            $data['ModelID'] = $ModelID;
            $data['ImagePath'] = $src;
            $data['ThumbImage'] = true;
            $data['CardImage'] = false;
            CarImage::create($data);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function AddCardImage($ModelID, $src)
    {
        try {
            $data['ModelID'] = $ModelID;
            $data['ImagePath'] = $src;
            $data['ThumbImage'] = false;
            $data['CardImage'] = true;
            CarImage::create($data);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function AddModelImage($ModelID, $src)
    {
        try {
            $data['ModelID'] = $ModelID;
            $data['ImagePath'] = $src;
            CarImage::create($data);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
//////////////////////////
/* Best Selling Car */
    public static function AddBestSellingCar($request)
    {
        try {
            BestSellingCar::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function UpdateBestSellingCar($request)
    {
        try {
            BestSellingCar::where('BestSellingCarID', $request['BestSellingCarID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
//////////////////////////
/* Latest Car */
    public static function AddLatestCar($request)
    {
        try {
            LatestCar::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function UpdateLatestCar($request)
    {
        try {
            LatestCar::where('LatestCarID', $request['LatestCarID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
//////////////////////////
/* Company */
    public static function AddCompany($request)
    {
        try {
            Company::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
    public static function FindCountryNameByBrandId($BrandID)
    {
        try {
            $model = Brand::where('BrandID', $BrandID)->first();

            if ($model != null) {
                $countryname = Company::where('CompanyID', $model->CompanyID)->first();
                return $countryname->Country;
            } else {
                return null;
            }

        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }

    }
    public static function FindCompanyNameByBrandId($BrandID)
    {
        try {
            $model = Brand::where('BrandID', $BrandID)->first();

            if ($model != null) {
                $companyname = Company::where('CompanyID', $model->CompanyID)->first();
                return $companyname->CompanyName;
            } else {
                return null;
            }

        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }

    }
    public static function UpdateCompany($request)
    {
        try {
            Company::where('CompanyID',$request['CompanyID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    /////////////////////////
/* Brands*/
    public static function AddBrand($request)
    {
        try {
            Brand::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
    public static function UpdateBrand($request)
    {
        try {
            Brand::where('BrandID',$request['BrandID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
    public static function FindBrandNameByBrandId($brandid)
    {
        try {
            $model = Brand::where('BrandID', $brandid)->first();
            if ($model != null) {
                return $model->BrandName;
            }

            return null;
        } catch (\Illuminate\Database\QueryException $e) {
            return null;
        }
    }
//////////////////////////
/* Order */
    public static function AddQuotation($request)
    {
        try {
            Order::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function UpdateQuotation($request)
    {
        try {
            Order::where('OrderID', $request['OrderID'])->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

/////////////////////////
/* Order Invoice*/
    public static function AddOrderInvoice($request)
    {
        try {
            OrderInvoice::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

/////////////////////////
/* Pay bill*/
    public static function AddBankTransactions($request)
    {
        try {
            BankPay::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    /////////////////////////
/* Email Configurations */
    public static function UpdateEmailConfigurations($request)
    {
        try {
            EmailInformation::where('EmailID_PK', 1)->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public static function AddEmailConfigurations($request)
    {
        try {
            EmailInformation::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

     /////////////////////////
/* Client Informations */
    public static function UpdateClientInformations($request)
    {
        try {
            ClientInformation::where('Companyid', 1)->update($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return false;
        }
    }

    public static function AddClientInformations($request)
    {
        try {
            ClientInformation::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return false;
        }
    }

/* Contacts */
    public static function AddCustomersQuery($request)
    {
        try {
            Contacts::create($request);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }


//////////////////////////
/* Client PC Information */
public static function AddClientSecurityInforamtion($request)
{
    try {
        OrderInformation::create($request);
        return true;
    } catch (\Illuminate\Database\QueryException $e) {
        return false;
    }
}
}

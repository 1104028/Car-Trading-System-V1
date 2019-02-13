<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\CarModel;


class AdminController extends Controller
{
    public function Index()
    {
        $allmodels = CarModel::with('bodytype')->paginate(13);
        return View('Admin.index',compact('allmodels'));
    }

    public function Create()
    {
        return View('auth.register');
    }

    public function Store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'UserFullName' => 'required|string|max:255',
            'ContactNumber' => 'required|max:20',
            'Email' => 'required|string|email|max:255|unique:users',
            'User_name' => 'required|string|string|max:255|unique:users',
            'password' => 'required|string',
        ]);
       
        $formInput = $request->all();
        $encryptpass = $request->input('password');
        $formInput['password'] = bcrypt($encryptpass);

        
        User::create($formInput);
 
        $msg= "Admin has been created successfully";
        return redirect()->route('index')->with('message',$msg);
    }
}

<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\BodyType;
use Illuminate\Http\Request;

class BodyTypeController extends Controller
{
    public function index()
    {
        $allbodytypes = BodyType::paginate(13);
        return View('Admin.BodyType.index', compact('allbodytypes'));
    }

    public function create()
    {
        return View('Admin.BodyType.Add');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'BodyTypeName' => 'required|unique:bodytypes|max:255',
            'BodyTypeImage' =>'required',
        ]);

        $DBAAccess = new CarTradingDBAccess();
        $BodyType = new BodyType();
        $BodyType->BodyTypeName = $request->BodyTypeName;

        if ($request->hasFile('BodyTypeImage')) {
            $image = $request->file('BodyTypeImage');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $logo_name = $request->BodyTypeName.".jpg";
            $destinationPath = public_path('/images/bodytype');
            $image->move($destinationPath, $logo_name);

            $BodyType->BodyTypeImage = $logo_name;

        }


        if ($DBAAccess->AddBodyStyle($BodyType)) {
            $msg = "Body Type has been added successfully!";
            return back()->with('message', $msg);
        } else {
            $msg = "Body Type has not been added successfully, Please try again  later!!!";
            return back()->with('message', $msg);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $bodytype = BodyType::find($id);

        return view('Admin.BodyType.edit', compact('bodytype', 'id'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'BodyTypeName' => 'required|unique:bodytypes|max:255',
        ]);

        $data = array();
        $data['BodyTypeID'] = $id;
        $data['BodyTypeName'] = $request->BodyTypeName;

        $DBAAccess = new CarTradingDBAccess();
        $add = $DBAAccess->UpdateBodyType($data);

        if ($add == true) {
            $msg = "Body Type has been updated successfully!!";
            return redirect()->route('bodytype.index')->with('message', $msg);
        } else {
            $msg = "Body Type has not been updated successfully, Please try again later!";
            return back()->with('message', $msg);
        }

    }

    public function destroy($id)
    {
        //
    }
}

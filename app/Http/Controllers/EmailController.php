<?php

namespace App\Http\Controllers;

use App\DataLayer\CarTradingDBAccess;
use App\Model\EmailInformation;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $emailinformations = EmailInformation::where('EmailID_PK', 1)->first();
        return view('Admin.Email.create', compact('emailinformations'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'SMTPclientAddr' => 'required|string|max:255',
            'SMTPclientPort' => 'required',
            'hostID' => 'required|string|max:255',
            'hostPass' => 'required|string|max:255',
            'notficationemail' => 'required|string|max:255',
        ]);

        $data = array();
        if ($request->SMTPclientAddr != null) {
            $data['SMTPclientAddr'] = $request->SMTPclientAddr;
        }

        if ($request->SMTPclientPort != null) {
            $data['SMTPclientPort'] = $request->SMTPclientPort;
        }

        if ($request->hostID != null) {
            $data['hostID'] = $request->hostID;
        }
        
        if ($request->hostPass != null) {
            $data['hostPass'] = $request->hostPass;
        }

        if ($request->notficationemail != null) {
            $data['notficationemail'] = $request->notficationemail;
        }
        $DBAAccess = new CarTradingDBAccess();

        $emailinformations = EmailInformation::where('EmailID_PK', 1)->first();

        if ($emailinformations != null) {
            if ($DBAAccess->UpdateEmailConfigurations($data)) {
                $msg = "Email Configurations has been updated successfully.";
                return redirect()->route('adminindex')->with('message', $msg);
            } else {
                $msg = "Email Configurations has been updated successfully, Please Try Again";
                return back()->with('message', $msg);
            }
        } else {
            if ($DBAAccess->AddEmailConfigurations($data)) {
                $msg = "Email Configurations has been added successfully.";
                return redirect()->route('adminindex')->with('message', $msg);
            } else {
                $msg = "Email Configurations has been updated successfully, Please Try Again";
                return back()->with('message', $msg);
            }

        }

    }

    public function show($id)
    {
        //
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

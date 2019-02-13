<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contacts;

class ContactsController extends Controller
{
    public function index()
    {
        $allcontacts = Contacts::orderBy('id', 'DESC')->paginate(13);

        return view('Admin.Contacts.index',compact('allcontacts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        Contacts::destroy($id);
        $msg = "Message has been deleted.";
        return back()->with('message',$msg);
    }
}

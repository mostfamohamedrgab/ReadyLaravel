<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactsController extends Controller
{
    public function index(){
      $msgs = Contact::all();
      return view('admin.contacts.index', compact('msgs'));
    }

    // delete
    public function destroy($id){

      $msg = Contact::findOrFail($id);
      $msg->delete();

      return back()->with('success','تم الحذف بنجاح');
    }
}

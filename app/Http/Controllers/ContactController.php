<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{

    public function show(){
      return view('pages.contact');
    }

    public function store(Request $request){
      $data = $request->validate([
        'name' => 'required|min:2|max:100',
        'email' => 'required|min:6|max:50',
        'msg' => 'required|min:2|max:200',
      ]);

      Contact::create($data);

      return back()->with('success','تم الاستلام شكرا لك ..');
    }
}

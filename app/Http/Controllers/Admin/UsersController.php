<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $users = User::all();
      return view('admin.users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  { 

      $data = $request->validate([
        'name' => 'required|min:2|max:100',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|max:20'
      ]);

      $data['password'] = Hash::make($request->password);

      User::create($data);

      return back()->with('success','تم ...');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $user = User::findOrFail($id);

      $data = $request->validate([
        'name' => 'required|min:2|max:100',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'password' => 'sometimes|nullable|min:8|max:20'
      ]);

      if(!empty($request->password))
      {
        $data['password'] = Hash::make($request->password);
      }else{
        $data['password'] = $user->password;
      }

      $user->update($data);

      return back()->with('success','تم ...');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  { 
      $user = User::findOrFail($id);
      $user->delete();

      return back()->with('info','تم ...');
  }
}

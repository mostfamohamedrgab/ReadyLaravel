<?php

namespace App\Http\Controllers\Admin;

use App\Challenge;
use App\Cat;
use App\Slove;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;


class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::all();
        return view('admin.challenges.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Cat::all();
        return view('admin.challenges.create', compact('cats'));
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
            'name' => 'required|min:2|max:255',
            'cat_id' => 'required',
            'content' => 'required|min:2',
            'value' => 'required|min:1',
            'points' => 'required|min:1',
            'end_at' => 'required|min:1',
        ]);


        if($request->hasFile('file'))
        {
          $fileName = $request->file->hashName();
          $request->file->move(public_path('storage/files'),$fileName);
          $data['file'] = $fileName;
        }

        Challenge::create($data);
        return back()->withSuccess('تم');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challenge = Challenge::findOrFail($id);
        $sloves = Slove::where('challenge_id',$challenge->id)->get();

        return view('admin.challenges.show', compact('sloves','challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Cat::all();
        $challenge = Challenge::findOrFail($id);
        return view('admin.challenges.edit', compact('cats','challenge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $challenge = Challenge::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|min:2|max:255',
            'cat_id' => 'required',
            'content' => 'required|min:2',
            'value' => 'required|min:1',
            'points' => 'required|min:1',
            'end_at' => 'required|min:1',
        ]);

        $data['file'] = $challenge->file;

        if($request->removeFile)
        {
          Storage::disk('files')->delete($challenge->file);
          $data['file'] = null;
        }

        if($request->hasFile('file'))
        {
          Storage::disk('files')->delete($challenge->file);
          $fileName = $request->file->hashName();
          $request->file->move(public_path('storage/files'),$fileName);
          $data['file'] = $fileName;
        }

        $challenge->update($data);
        return back()->withSuccess('تم');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $challenge = Challenge::findOrFail($id);
        Storage::disk('files')->delete($challenge->file);
        $challenge->delete();
        return back()->withSuccess('تم');
    }
}

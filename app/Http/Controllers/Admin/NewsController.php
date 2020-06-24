<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        'title' => 'required',
        'description' => 'nullable|max:50',
        'content' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ],[
        'title.required' => 'العنوان مطلوب',
        'content.required' => 'المحتوي مطلوب',
        'image.required' => 'اللوجو مطلوب',
        'image.image' => 'اللوجو يجب ان يكون صوره',
      ]);

      $image = $request->image;
      $imageName = $image->hashName();
      $image->move(\public_path('storage/imgs'),$imageName);
     

      $data['image'] = $imageName;
      News::create($data);
      return back()->with('success','تم الاضافه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::findOrFail($id);
        return view('admin.news.show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);
        return view('admin.news.edit', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $new = News::findOrFail($id);

      $data = $request->validate([
        'title' => 'required',
        'description' => 'max:50',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ],[
        'title.required' => 'الاسم مطلوب',
        'content.required' => 'المحتوي مطلوب',
        'image.image' => 'اللوجو يجب ان يكون صوره',
      ]);
      // check if therer is new image update and
      // delete old iamge form server
      if($request->hasFile('image')){
        $image = $request->image;
        $imageName = $image->hashName();

        $image->move(\public_path('storage/imgs'),$imageName);
        // set hash logo name
        $data['image'] = $imageName;
        Storage::disk('imgs')->delete($new->image);
      }else{
        $data['image'] = $new->image;
      }

      

      $new->update($data);
      return back()->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        Storage::disk('imgs')->delete($new->image);
        $new->delete();

        return back()->with('success','تم  الحذف بنجاح');
    }
}

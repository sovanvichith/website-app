<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Banner::all();
        return view('banners.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:banners,name',
            'description'=>'nullable',
            'image'=>'nullable|image|max:2048'
        ]);
        $data = $request->only(['name','description']);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/banners'), $imageName);
            $data['image'] = 'images/banners/'.$imageName;
        }
        Banner::create($data);

        return redirect()->route('banners.index')->with('success','Banner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Banner::findOrFail($id);
        return view('banners.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'name'=>'required|unique:banners,name,'.$banner->id,
            'description'=>'nullable',
            'image'=>'nullable|image|max:2048'
        ]);
        $data = $request->only(['name','description']);

        if($request->hasFile('image')){
            if($banner->image && file_exists(public_path($banner->image))){
                unlink(public_path($banner->image));
            }
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/banners'), $imageName);
            $data['image'] = 'images/banners/'.$imageName;
        }
        $banner->update($data);

        return redirect()->route('banners.index')->with('success','Banner undate successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner =Banner::findOrFail($id);

        if($banner->image && file_exists(public_path($banner->image))){
            unlink(public_path($banner->image));
        }
        $banner->delete();
        return redirect()->route('banners.index')->with('success','Banner deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $row = Setting::findOrFail($id);
        return view('settings.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Setting::findOrFail($id);
        $request->validate([
            'title' => 'required|unique:settings,title,' . $row->id,
       
        ]);
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/settings'), $filename);
            $data['logo'] = 'images/settings/' . $filename;
        } else {
            $data['logo'] = $row->logo;
        }
        $row->update($data);
        return redirect()->route('settings.edit', $row->id)->with('success','Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

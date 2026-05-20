<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Role::whereNull('deleted_at')->get();
        return view('roles.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name|max:100|min:3',
        ]);

        try {
            Role::create([
                'name' =>$request->name,
                'description' => $request->description,
            ]);
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            throw $th;
        }
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
        $row = Role::findOrFail($id);
        return view('roles.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Role::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,'. $id .'|max:100|min:3',
        ]);

        try {
            $row->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Role::findOrFail($id);
        $row->delete();
        return redirect()->route('roles.index');

    }
}
